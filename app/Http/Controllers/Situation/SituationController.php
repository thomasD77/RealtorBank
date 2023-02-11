<?php

namespace App\Http\Controllers\Situation;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use App\Models\Situation;
use App\Models\Tenant;
use Illuminate\Http\Request;

class SituationController extends Controller
{
    //
    public function create(Inspection $inspection)
    {
        $tenant = new Tenant();
        $tenant->created_at = now();
        $tenant->updated_at = now();
        $tenant->save();

        $situation = new Situation();
        $situation->inspection_id = $inspection->id;
        $situation->tenant_id = $tenant->id;
        $situation->created_at = now();
        $situation->updated_at = now();
        $situation->save();

        return to_route('situation.edit', [ $inspection , $situation]);
    }

}
