<?php

namespace App\Http\Controllers\Situation;

use App\Enums\FloorKey;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Jobs\GeneratePDF;
use App\Models\Contract;
use App\Models\Damage;
use App\Models\DamagesSituation;
use App\Models\Document;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Key;
use App\Models\MediaProfiles;
use App\Models\MediaStore;
use App\Models\Meter;
use App\Models\Owner;
use App\Models\RentalClaim;
use App\Models\Room;
use App\Models\Situation;
use App\Models\TechniqueArea;
use App\Models\Tenant;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SituationController extends Controller
{
    //
    public function create(Inspection $inspection)
    {
        $tenant = new Tenant();
        $tenant->created_at = now();
        $tenant->updated_at = now();
        $tenant->save();

        $owner = new Owner();
        $owner->created_at = now();
        $owner->updated_at = now();
        $owner->save();

        $situation = new Situation();
        $situation->inspection_id = $inspection->id;
        $situation->tenant_id = $tenant->id;
        $situation->owner_id = $owner->id;
        $situation->created_at = now();
        $situation->updated_at = now();
        $situation->save();

        // Get the latest INTREDE
        $last_intrede = Situation::query()
            ->where('intrede', 1)
            ->where('inspection_id', $inspection->id)
            ->orderBy('date', 'desc')
            ->first();

        if ($last_intrede) {
            // Get all the damages AFTER the latest INTREDE
            if($last_intrede->date){
                $damages = Damage::query()
                    ->where('inspection_id', $inspection->id)
                    ->where('date', '>=', $last_intrede->date)
                    ->get();

                // Mark for PDF print
                foreach ($damages as $damage){
                    $situation->damages()->attach($damage->id, [
                        'print_pdf' => 1,
                        'archived' => 0
                    ]);
                }
            }
        }

        if ($last_intrede) {
            // Get all the damages BEFORE the latest INTREDE
            if($last_intrede->date){
                $damages = Damage::query()
                    ->where('inspection_id', $inspection->id)
                    ->where('date', '<', $last_intrede->date)
                    ->get();

                // Archive the damages
                foreach ($damages as $damage){
                    $situation->damages()->attach($damage->id, [
                        'print_pdf' => 0,
                        'archived' => 1
                    ]);
                }
            }
        }

        $contract = new Contract();
        $contract->inspection_id = $inspection->id;
        $contract->situation_id = $situation->id;
        $contract->save();

        $claim = new RentalClaim();
        $claim->inspection_id = $inspection->id;
        $claim->situation_id = $situation->id;
        $claim->save();

        return to_route('situation.edit', [ $inspection , $situation]);
    }

    //This function is only for testing purpose
    public function genereatePDF(Inspection $inspection, Situation $situation)
    {
        $documents = Document::query()
            ->whereNotNull('title')
            ->orWhereNotNull('reference')
            ->orWhereNotNull('date')
            ->orHas('media', '>', 0)
            ->get();
        $documents = $documents->where('inspection_id', $inspection->id);

        $meters = Meter::query()
            ->whereNotNull('reference')
            ->orWhereNotNull('EAN')
            ->orWhereNotNull('date')
            ->orHas('media', '>', 0)
            ->get();
        $meters = $meters->where('inspection_id', $inspection->id);

        $keys = Key::query()
            ->whereNotNull('type')
            ->orWhereNotNull('count')
            ->orWhereNotNull('extra')
            ->orHas('media', '>', 0)
            ->get();
        $keys = $keys->where('inspection_id', $inspection->id);

        $techniqueArea = TechniqueArea::query()
            ->whereNotNull('type')
            ->orWhereNotNull('analysis')
            ->orWhereNotNull('fuel')
            ->orWhereNotNull('brand')
            ->orWhereNotNull('model')
            ->orWhereNotNull('count')
            ->orWhereNotNull('extra')
            ->orHas('media', '>', 0)
            ->get();
        $techniqueArea = $techniqueArea->where('inspection_id', $inspection->id);

        $claim = RentalClaim::query()
            ->where('inspection_id', $inspection->id)
            ->where('situation_id', $situation->id)
            ->first();

        $basementParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::BasementFloor)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $groundFloorParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
            ->orderBy('order', 'asc')
            ->get();

        $upperFloorParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::UpperFloor)->first()->id)
            ->orderBy('order', 'asc')
            ->get();

        $atticParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Attic)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $garageParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Garage)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $buildingParam = Room::with(['outdoorAreas', 'outdoorAreas.outdoor'])
            ->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Building)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $driveWayParam = Room::with(['outdoorAreas', 'outdoorAreas.outdoor'])
            ->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::DriveWay)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $outHouseInParam =  Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::OutHouseIn)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $outHouseExParam =  Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::OutHouseEx)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $contract =  Contract::where('inspection_id', $inspection->id)
            ->where('situation_id', $situation->id)
            ->first();

        $logos = MediaProfiles::where('user_id', Auth()->user()->id)->get();

        $insp_damages =  Damage::query()
            ->where('inspection_id', $inspection->id)
            ->whereNull('basic_id')
            ->whereNull('specific_id')
            ->whereNull('conform_id')
            ->whereNull('general_id')
            ->whereNull('outdoor_id')
            ->whereNull('technique_id')
            ->get();

        $pdf = Pdf::loadView('inspections.pdf', [
            'inspection' => $inspection,
            'basementParam' => $basementParam,
            'groundFloorParam' => $groundFloorParam,
            'upperFloorParam' => $upperFloorParam,
            'atticParam' => $atticParam,
            'garageParam' => $garageParam,
            'buildingParam' => $buildingParam,
            'driveWayParam' => $driveWayParam,
            'outHouseInParam' => $outHouseInParam,
            'outHouseExParam' => $outHouseExParam,
            'techniqueArea' => $techniqueArea,
            'meters' => $meters,
            'documents' => $documents,
            'keys' => $keys,
            'contract' => $contract,
            'claim' => $claim,
            'situation' => $situation,
            'logos' => $logos,
            'insp_damages' => $insp_damages,
        ]);



        return $pdf->stream('plaatsbeschrijving-' . '#' . $inspection->id . '.pdf');
    }

//    public function genereatePDF(Inspection $inspection, Situation $situation)
//    {
//        $rawFileName = time(). '-INSP-' . $inspection->id . '-plaatsbeschrijving.pdf';
//        $cleanFileName = Str::limit($inspection->title, 20, '...') . '-' . now()->format('d-m-Y') . '-plaatsbeschrijving.pdf';
//        $fileName = MediaStore::getValidFilename($rawFileName);
//
//        $pdfStore = new \App\Models\PDF();
//        $pdfStore->inspection_id = $inspection->id;
//        $pdfStore->situation_id = $situation->id;
//        $pdfStore->title = $cleanFileName;
//        $pdfStore->file_original = $fileName;
//        $pdfStore->status = Status::Pending->value;
//        $pdfStore->save();
//
//        $user = Auth()->user();
//
//        $this->dispatch(new GeneratePDF($inspection, $fileName, $pdfStore, $situation, $user));
//        Session::flash('successPDF', 'PDF is aan het genereren.');
//
//        return redirect()->back();
//    }

    public function signature(Request $request)
    {
        $folderPath = public_path('assets/signatures/');

        if(!File::isDirectory($folderPath)){
            File::makeDirectory($folderPath, 0777, true, true);
        }

        $image_parts = explode(";base64,", $request->signed);

        //Check when signature is empty
        if($image_parts[0] == ''){
            return redirect()->back();
        }

        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . 'signature-' . time() . '.'.$image_type;
        file_put_contents($file, $image_base64);

        $contract = Contract::find($request->contract);
        $name = 'signature-' . time() . '.'.$image_type;

        if($request->tenant){
            File::delete('assets/signatures/' . $contract->signature_tenant);

            $contract->signature_tenant = $name;
            $contract->update();
            Session::flash('successTenant', 'Handtekening werd succesvol opgeslagen.');


        }

        elseif($request->user){
            $user = Auth()->user();
            File::delete('assets/signatures/' . $user->signature);

            $user->signature = $name;
            $user->update();
            Session::flash('success', 'Handtekening werd succesvol opgeslagen.');
        }

        else {
            File::delete('assets/signatures/' . $contract->signature_realtor);

            $contract->signature_owner = $name;
            $contract->update();
            Session::flash('success', 'Handtekening werd succesvol opgeslagen.');
        }

        return redirect()->back();
    }

    public function toggleContract(Request $request){

        $contract = Contract::find($request->contract);

        if($contract->lock == 1){
            $contract->lock = 0;
        }else {
            $contract->lock = 1;
        }
        $contract->update();

        return redirect()->back();
    }

    public function printContract(Inspection $inspection, Contract $contract, Situation $situation)
    {
        $pdf = Pdf::loadView('contracts.pdf', [
            'inspection' => $inspection,
            'contract' => $contract,
            'situation' => $situation,
        ]);

        return $pdf->download('mandaat-' . '#' . $inspection->id . '-' . $contract->id . '.pdf');
    }

    public function toggleClaim(Request $request){

        $claim = RentalClaim::find($request->claim);

        if($claim->lock == 1){
            $claim->lock = 0;
        }else {
            $claim->lock = 1;
        }
        $claim->update();

        return redirect()->back();
    }

    public function signatureClaim(Request $request)
    {
        $folderPath = public_path('assets/signatures/');

        if(!File::isDirectory($folderPath)){
            File::makeDirectory($folderPath, 0777, true, true);
        }

        $image_parts = explode(";base64,", $request->signed);

        //Check when signature is empty
        if($image_parts[0] == ''){
            return redirect()->back();
        }

        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . 'signature-' . time() . '.'.$image_type;
        file_put_contents($file, $image_base64);

        $claim = RentalClaim::find($request->claim);
        $name = 'signature-' . time() . '.'.$image_type;

        if($request->tenant){
            File::delete('assets/signatures/' . $claim->signature_tenant);

            $claim->signature_tenant = $name;
            $claim->update();
            Session::flash('successTenant', 'Handtekening werd succesvol opgeslagen.');
        }
        else {
            File::delete('assets/signatures/' . $claim->signature_realtor);

            $claim->signature_owner = $name;
            $claim->update();
            Session::flash('success', 'Handtekening werd succesvol opgeslagen.');
        }

        return redirect()->back();
    }

    public function printClaim(Inspection $inspection, RentalClaim $claim, Situation $situation)
    {
        $damages = Damage::query()
            ->where('inspection_id', $inspection->id)
            ->where('print_pdf', 1)
            ->orderBy('date', 'desc')
            ->get();

        $pdf = Pdf::loadView('claims.pdf', [
            'inspection' => $inspection,
            'claim' => $claim,
            'situation' => $situation,
            'damages' => $damages
        ]);

        return $pdf->download('huurschade-' . '#' . $inspection->id . '-' . $claim->id . '.pdf');
    }

}
