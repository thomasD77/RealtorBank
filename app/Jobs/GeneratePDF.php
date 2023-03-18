<?php

namespace App\Jobs;

use App\Models\BasicArea;
use App\Models\Document;
use App\Models\Inspection;
use App\Models\Key;
use App\Models\Meter;
use App\Models\Room;
use App\Models\TechniqueArea;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GeneratePDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Inspection $inspection;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($inspection)
    {
        //
        $this->inspection = $inspection;
    }

    /**
     * Execute the job.
     *
     *
     */
    public function handle()
    {
        //
        $documents = Document::query()
            ->whereNotNull('title')
            ->orWhereNotNull('reference')
            ->orWhereNotNull('date')
            ->orHas('media', '>', 0)
            ->where('inspection_id', $this->inspection->id)
            ->get();

        $meters = Meter::query()
            ->whereNotNull('reference')
            ->orWhereNotNull('EAN')
            ->orWhereNotNull('date')
            ->orHas('media', '>', 0)
            ->where('inspection_id', $this->inspection->id)
            ->get();

        $keys = Key::query()
            ->orWhereNotNull('type')
            ->orWhereNotNull('count')
            ->orWhereNotNull('extra')
            ->orHas('media', '>', 0)
            ->where('inspection_id', $this->inspection->id)
            ->get();

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
            ->orHas('media', '>', 0)
            ->where('inspection_id', $this->inspection->id)
            ->get();

        $techniqueArea = TechniqueArea::query()
            ->whereNotNull('type')
            ->orWhereNotNull('analysis')
            ->orWhereNotNull('fuel')
            ->orWhereNotNull('brand')
            ->orWhereNotNull('model')
            ->orWhereNotNull('count')
            ->orWhereNotNull('extra')
            ->orHas('media', '>', 0)
            ->where('inspection_id', $this->inspection->id)
            ->get();

        $rooms = Room::query()
            ->where('inspection_id', $this->inspection->id)
            ->get();

        $pdf = Pdf::loadView('inspections.pdf', [
            'inspection' => $this->inspection,
            'basicArea' => $basicArea,
            'rooms' => $rooms,
            'techniqueArea' => $techniqueArea,
            'meters' => $meters,
            'documents' => $documents,
            'keys' => $keys,
        ]);

        //return $pdf->stream('plaatsbeschrijving-' . '#' . $this->inspection->id . '.pdf');

        $path = public_path('assets/pdf/');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $fileName = '-plaatsbeschrijving-' . 'INSP#' . $this->inspection->id . '.pdf';

        $pdf->save($path  . $fileName);

        $pdfStore = new PDF();
        $pdfStore->inspection_id = $this->inspection->id;
        $pdfStore->title = 'Plaatsbeschrijving';
        $pdfStore->file_original = $fileName;
        $pdfStore->save();
    }
}
