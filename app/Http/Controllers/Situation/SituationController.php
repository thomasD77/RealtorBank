<?php

namespace App\Http\Controllers\Situation;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Inspection;
use App\Models\Owner;
use App\Models\Situation;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

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

    public function signature(Request $request)
    {
        $folderPath = public_path('assets/signatures/');

        if(!File::isDirectory($folderPath)){
            File::makeDirectory($folderPath, 0777, true, true);
        }

        $image_parts = explode(";base64,", $request->signed);
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
        }else {
            File::delete('assets/signatures/' . $contract->signature_realtor);

            $contract->signature_realtor = $name;
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

}
