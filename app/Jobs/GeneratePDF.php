<?php

namespace App\Jobs;

use App\Enums\Status;
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
    public string $fileName;
    public \App\Models\PDF $pdfStore;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($inspection, $fileName, $pdfStore)
    {
        //
        $this->inspection = $inspection;
        $this->fileName = $fileName;
        $this->pdfStore = $pdfStore;
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

        $inspection = Inspection::find($this->inspection->id);

        $pdf = Pdf::loadView('inspections.pdf', [
            'inspection' => $inspection,
            'rooms' => $rooms,
            'techniqueArea' => $techniqueArea,
            'meters' => $meters,
            'documents' => $documents,
            'keys' => $keys,
        ]);

        $path = public_path('assets/inspections/pdf/');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $pdf->save($path  . $this->fileName);

        $this->pdfStore->status = Status::Rendered->value;
        $this->pdfStore->update();
    }
}