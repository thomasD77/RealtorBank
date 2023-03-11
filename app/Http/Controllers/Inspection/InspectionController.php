<?php

namespace App\Http\Controllers\Inspection;

use App\Enums\Keys;
use App\Http\Controllers\Controller;
use App\Models\BasicArea;
use App\Models\Document;
use App\Models\Inspection;
use App\Models\Key;
use App\Models\MediaInspection;
use App\Models\TechniqueArea;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class InspectionController extends Controller
{
    //
    public function create()
    {
        $inspection = Inspection::createInspection();
        return to_route('inspection.edit', $inspection);
    }

    public function createDocument(Inspection $inspection)
    {
        $document = Document::create([
            'inspection_id' => $inspection->id,
            'title' => 'DRAFT',
            'date' => now(),
        ]);
        return to_route('document.edit', [ $inspection, $document ]);
    }

    public function genereatePDF(Inspection $inspection)
    {
        $files = MediaInspection::where('inspection_id', $inspection->id)->get();
        $techniqueArea = TechniqueArea::where('inspection_id', $inspection->id)->get();

        $basicArea = BasicArea::query()
            ->whereNotNull('material')
            ->orWhereNotNull('color')
            ->orWhereNotNull('plinth')
            ->orWhereNotNull('analysis')
            ->orWhereNotNull('type')
            ->orWhereNotNull('handle')
            ->orWhereNotNull('lists')
            ->orWhereNotNull('key')
            ->orWhereNotNull('doorPump')
            ->orWhereNotNull('doorStop')
            ->orWhereNotNull('plaster')
            ->orWhereNotNull('finish')
            ->orWhereNotNull('ventilationGrille')
            ->orWhereNotNull('glazing')
            ->orWhereNotNull('windowsill')
            ->orWhereNotNull('rollerShutter')
            ->orWhereNotNull('windowDecoration')
            ->orWhereNotNull('hor')
            ->orWhereNotNull('fallProtection')
            ->orWhereNotNull('energy')
            ->orWhereNotNull('extra')
            ->where('inspection_id', $inspection->id)
            ->get();

        $pdf = Pdf::loadView('inspections.pdf', [
            'inspection' => $inspection,
            'files' => $files,
            'techniqueArea' => $techniqueArea,
            'basicArea' => $basicArea
        ]);

        return $pdf->stream('plaatsbeschrijving-' . '#' . $inspection->id . '.pdf');
    }
}
