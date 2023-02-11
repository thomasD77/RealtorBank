<?php

namespace App\Http\Controllers\Inspection;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use App\Models\MediaInspection;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    //
    public function create()
    {
        $inspection = Inspection::createInspection();
        return to_route('inspection.edit', $inspection);
    }

    public function genereatePDF(Inspection $inspection)
    {
        $files = MediaInspection::where('inspection_id', $inspection->id)->get();

        $pdf = Pdf::loadView('inspections.pdf', compact('inspection', 'files'));
        return $pdf->stream('plaatsbeschrijving-' . '#' . $inspection->id . '.pdf');
    }
}
