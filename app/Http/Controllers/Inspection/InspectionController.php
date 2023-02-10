<?php

namespace App\Http\Controllers\Inspection;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
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
        $pdf = Pdf::loadView('inspections.pdf', compact('inspection'));
        return $pdf->download('plaatsbeschrijving-' . $inspection->title . '.pdf');
    }
}
