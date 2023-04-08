<?php

namespace App\Http\Controllers\Inspection;

use App\Enums\Keys;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Jobs\GeneratePDF;
use App\Jobs\UploadLargeImageFiles;
use App\Models\BasicArea;
use App\Models\Contract;
use App\Models\Document;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Key;
use App\Models\MediaInspection;
use App\Models\MediaStore;
use App\Models\Meter;
use App\Models\Room;
use App\Models\TechniqueArea;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    //This function is only for testing purpose
//    public function genereatePDF(Inspection $inspection)
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
//
//        $rooms = Room::query()
//            ->where('inspection_id', $inspection->id)
//            ->get();
//
//        $pdf = Pdf::loadView('inspections.pdf', [
//            'inspection' => $inspection,
//            'rooms' => $rooms,
//            'techniqueArea' => $techniqueArea,
//            'meters' => $meters,
//            'documents' => $documents,
//            'keys' => $keys,
//        ]);
//
//        return $pdf->stream('plaatsbeschrijving-' . '#' . $inspection->id . '.pdf');
//    }

    public function genereatePDF(Inspection $inspection)
    {
        $rawFileName = time(). '-INSP-' . $inspection->id . '-plaatsbeschrijving.pdf';
        $cleanFileName = Str::limit($inspection->title, 20, '...') . '-' . now()->format('d-m-Y') . '-plaatsbeschrijving.pdf';
        $fileName = MediaStore::getValidFilename($rawFileName);

        $pdfStore = new \App\Models\PDF();
        $pdfStore->inspection_id = $inspection->id;
        $pdfStore->title = $cleanFileName;
        $pdfStore->file_original = $fileName;
        $pdfStore->status = Status::Pending->value;
        $pdfStore->save();

        $this->dispatch(new GeneratePDF($inspection, $fileName, $pdfStore));
        Session::flash('successPDF', 'PDF is aan het genereren.');

        return redirect()->back();
    }
}
