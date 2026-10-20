<?php

namespace App\Jobs;

use App\Enums\FloorKey;
use App\Enums\Status;
use App\Models\BasicArea;
use App\Models\Contract;
use App\Models\Damage;
use App\Models\Document;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Key;
use App\Models\MediaProfiles;
use App\Models\Meter;
use App\Models\RentalClaim;
use App\Models\Room;
use App\Models\Situation;
use App\Models\TechniqueArea;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GeneratePDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 300;
    public $tries = 1;
    public $failOnTimeout = true;

    public Inspection $inspection;
    public Situation $situation;
    public User $user;

    public string $fileName;
    public \App\Models\PDF $pdfStore;

    /**
     * Edit a new job instance.
     *
     * @return void
     */
    public function __construct($inspection, $fileName, $pdfStore, $situation, $user)
    {
        //
        $this->inspection = $inspection;
        $this->fileName = $fileName;
        $this->pdfStore = $pdfStore;
        $this->situation = $situation;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     *
     */
    public function handle()
    {
        $startedAt = microtime(true);
        $checkpoint = $startedAt;
        $logTiming = function (string $stage) use (&$checkpoint, $startedAt): void {
            $now = microtime(true);
            Log::info('PDF generation timing', [
                'pdf_id' => $this->pdfStore->id,
                'inspection_id' => $this->inspection->id,
                'stage' => $stage,
                'stage_seconds' => round($now - $checkpoint, 3),
                'total_seconds' => round($now - $startedAt, 3),
                'peak_memory_mb' => round(memory_get_peak_usage(true) / 1048576, 1),
            ]);
            $checkpoint = $now;
        };

        $this->pdfStore->status = Status::Processing->value;
        $this->pdfStore->save();
        //
        $documents = Document::query()
            ->where('inspection_id', $this->inspection->id)
            ->where(function ($query) {
                $query->whereNotNull('title')
                    ->orWhereNotNull('reference')
                    ->orWhereNotNull('date')
                    ->orHas('media', '>', 0);
            })
            ->orderBy('title', 'asc')
            ->get();

        $meters = Meter::query()
            ->where('inspection_id', $this->inspection->id)
            ->where(function ($query) {
                $query->whereNotNull('reference')
                    ->orWhereNotNull('EAN')
                    ->orWhereNotNull('date')
                    ->orHas('media', '>', 0);
            })
            ->orderBy('title', 'asc')
            ->get();

        $keys = Key::query()
            ->where('inspection_id', $this->inspection->id)
            ->where(function ($query) {
                $query->whereNotNull('type')
                    ->orWhereNotNull('count')
                    ->orWhereNotNull('extra')
                    ->orHas('media', '>', 0);
            })
            ->orderBy('title', 'asc')
            ->get();

        $techniqueArea = TechniqueArea::query()
            ->where('inspection_id', $this->inspection->id)
            ->where(function ($query) {
                $query->whereNotNull('type')
                    ->orWhereNotNull('analysis')
                    ->orWhereNotNull('fuel')
                    ->orWhereNotNull('brand')
                    ->orWhereNotNull('model')
                    ->orWhereNotNull('count')
                    ->orWhereNotNull('extra')
                    ->orHas('media', '>', 0);
            })
            ->get();

        $rooms = Room::query()
            ->where('inspection_id', $this->inspection->id)
            ->orderBy('title', 'asc')
            ->get();

        $inspection = Inspection::find($this->inspection->id);

        $contract = Contract::query()
            ->where('inspection_id', $inspection->id)
            ->where('situation_id', $this->situation->id)
            ->first();

        $claim = RentalClaim::query()
            ->where('inspection_id', $inspection->id)
            ->where('situation_id', $this->situation->id)
            ->first();

        $basementParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::BasementFloor)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $groundFloorParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
            ->orderBy('order', 'asc')
            ->get();

        $upperFloorParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::UpperFloor)->first()->id)
            ->orderBy('order', 'asc')
            ->get();

        $atticParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Attic)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $garageParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Garage)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $buildingParam = Room::with(['outdoorAreas', 'outdoorAreas.outdoor'])
            ->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Building)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $driveWayParam = Room::with(['outdoorAreas', 'outdoorAreas.outdoor'])
            ->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::DriveWay)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $outHouseInParam =  Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::OutHouseIn)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $outHouseExParam =  Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::OutHouseEx)->first()->id)
            ->orderBy('title', 'asc')
            ->get();

        $logos = MediaProfiles::where('user_id', $this->user->id)->get();

        $insp_damages =  Damage::query()
            ->where('inspection_id', $this->inspection->id)
            ->whereNull('basic_id')
            ->whereNull('specific_id')
            ->whereNull('conform_id')
            ->whereNull('general_id')
            ->whereNull('outdoor_id')
            ->whereNull('technique_id')
            ->get();

        $logTiming('database_and_data_loading');

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
            'situation' => $this->situation,
            'logos' => $logos,
            'insp_damages' => $insp_damages,
        ]);

        $logTiming('pdf_view_preparation');

        $path = public_path('assets/inspections/pdf/');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $pdf->save($path  . $this->fileName);
        $logTiming('pdf_render_and_save');

        $this->pdfStore->status = Status::Rendered->value;
        $this->pdfStore->update();
        $logTiming('status_update');
    }

    public function failed(\Throwable $exception): void
    {
        \App\Models\PDF::whereKey($this->pdfStore->id)->update([
            'status' => Status::Failed->value,
        ]);

        \Illuminate\Support\Facades\Log::error('PDF generation failed', [
            'pdf_id' => $this->pdfStore->id,
            'inspection_id' => $this->inspection->id,
            'exception' => $exception->getMessage(),
        ]);
    }
}
