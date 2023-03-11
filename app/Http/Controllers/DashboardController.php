<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Conform;
use App\Models\ConformArea;
use App\Models\Inspection;
use App\Models\Outdoor;
use App\Models\OutdoorArea;
use App\Models\Room;
use App\Models\Specific;
use App\Models\SpecificArea;
use App\Models\Technique;
use App\Models\TechniqueArea;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        return view('dashboard');
    }

    public function detail(Inspection $inspection, Room $room, Area $area): View
    {
        $basicArea = BasicArea::query()
            ->where('room_id', $room->id)
            ->where('area_id', $area->id)
            ->first();

        return view('basic-areas.template', [
            'inspection' => $inspection,
            'room' => $room,
            'area' => $area,
            'basicArea' => $basicArea
        ]);
    }

    public function conform(Inspection $inspection, Room $room, Conform $conform): View
    {
        $conformArea = ConformArea::query()
            ->where('room_id', $room->id)
            ->where('conform_id', $conform->id)
            ->first();

        return view('conform-areas.template', [
            'inspection' => $inspection,
            'room' => $room,
            'conform' => $conform,
            'conformArea' => $conformArea
        ]);
    }

    public function specific(Inspection $inspection, Room $room, Specific $specific): View
    {
        $specificArea = SpecificArea::query()
            ->where('room_id', $room->id)
            ->where('specific_id', $specific->id)
            ->first();

        return view('specific-areas.template', [
            'inspection' => $inspection,
            'room' => $room,
            'specific' => $specific,
            'specificArea' => $specificArea
        ]);
    }

    public function technique(Inspection $inspection, Technique $technique): View
    {
        $techniqueArea = TechniqueArea::query()
            ->where('inspection_id', $inspection->id)
            ->where('technique_id', $technique->id)
            ->first();

        return view('technique-areas.template', [
            'inspection' => $inspection,
            'technique' => $technique,
            'techniqueArea' => $techniqueArea
        ]);
    }

    public function outdoor(Inspection $inspection, Outdoor $outdoor): View
    {
        $outDoorArea = OutdoorArea::query()
            ->where('inspection_id', $inspection->id)
            ->where('outdoor_id', $outdoor->id)
            ->first();

        return view('outdoor-areas.template', [
            'inspection' => $inspection,
            'outdoor' => $outdoor,
            'outDoorArea' => $outDoorArea
        ]);
    }

    public function general(Inspection $inspection, Room $room): View
    {
        return view('general.general', [
            'inspection' => $inspection,
            'room' => $room,
        ]);
    }
}
