<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Conform;
use App\Models\ConformArea;
use App\Models\Inspection;
use App\Models\Room;
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

        return view('basic-areas.form', [
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

        return view('conform-areas.form', [
            'inspection' => $inspection,
            'room' => $room,
            'conform-areas' => $conform,
            'conformArea' => $conformArea
        ]);
    }
}
