<?php

namespace App\Http\Controllers\Situation;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Jobs\GeneratePDF;
use App\Models\Contract;
use App\Models\Damage;
use App\Models\Document;
use App\Models\Inspection;
use App\Models\Key;
use App\Models\MediaStore;
use App\Models\Meter;
use App\Models\Owner;
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

        $contract = new Contract();
        $contract->inspection_id = $inspection->id;
        $contract->situation_id = $situation->id;
        $contract->save();

        return to_route('situation.edit', [ $inspection , $situation]);
    }

    //This function is only for testing purpose
//    public function genereatePDF(Inspection $inspection, Situation $situation)
//    {
//        $documents = Document::query()
//            ->whereNotNull('title')
//            ->orWhereNotNull('reference')
//            ->orWhereNotNull('date')
//            ->orHas('media', '>', 0)
//            ->get();
//        $documents = $documents->where('inspection_id', $inspection->id);
//
//        $meters = Meter::query()
//            ->whereNotNull('reference')
//            ->orWhereNotNull('EAN')
//            ->orWhereNotNull('date')
//            ->orHas('media', '>', 0)
//            ->get();
//        $meters = $meters->where('inspection_id', $inspection->id);
//
//        $keys = Key::query()
//            ->whereNotNull('type')
//            ->orWhereNotNull('count')
//            ->orWhereNotNull('extra')
//            ->orHas('media', '>', 0)
//            ->get();
//        $keys = $keys->where('inspection_id', $inspection->id);
//
//        $techniqueArea = TechniqueArea::query()
//            ->whereNotNull('type')
//            ->orWhereNotNull('analysis')
//            ->orWhereNotNull('fuel')
//            ->orWhereNotNull('brand')
//            ->orWhereNotNull('model')
//            ->orWhereNotNull('count')
//            ->orWhereNotNull('extra')
//            ->orHas('media', '>', 0)
//            ->get();
//        $techniqueArea = $techniqueArea->where('inspection_id', $inspection->id);
//
//        $rooms = Room::query()
//            ->where('inspection_id', $inspection->id)
//            ->get();
//
//        $contract = Contract::where('inspection_id', $inspection->id)->first();
//
//        $pdf = Pdf::loadView('inspections.pdf', [
//            'inspection' => $inspection,
//            'rooms' => $rooms,
//            'techniqueArea' => $techniqueArea,
//            'meters' => $meters,
//            'documents' => $documents,
//            'keys' => $keys,
//            'contract' => $contract,
//            'situation' => $situation,
//        ]);
//
//        return $pdf->stream('plaatsbeschrijving-' . '#' . $inspection->id . '.pdf');
//    }

    public function genereatePDF(Inspection $inspection, Situation $situation)
    {
        $rawFileName = time(). '-INSP-' . $inspection->id . '-plaatsbeschrijving.pdf';
        $cleanFileName = Str::limit($inspection->title, 20, '...') . '-' . now()->format('d-m-Y') . '-plaatsbeschrijving.pdf';
        $fileName = MediaStore::getValidFilename($rawFileName);

        $pdfStore = new \App\Models\PDF();
        $pdfStore->inspection_id = $inspection->id;
        $pdfStore->situation_id = $situation->id;
        $pdfStore->title = $cleanFileName;
        $pdfStore->file_original = $fileName;
        $pdfStore->status = Status::Pending->value;
        $pdfStore->save();

        $this->dispatch(new GeneratePDF($inspection, $fileName, $pdfStore, $situation));
        Session::flash('successPDF', 'PDF is aan het genereren.');

        return redirect()->back();
    }

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

}
