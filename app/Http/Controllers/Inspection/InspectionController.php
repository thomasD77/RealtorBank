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
}
