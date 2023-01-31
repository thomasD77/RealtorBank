<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Inspection;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard');
    }

    public function detail(Inspection $inspection, Room $room, Area $area)
    {
        return view('basic-areas.' . $area->code, [
            'inspection' => $inspection,
            'room' => $room,
            'area' => $area
        ]);
    }
}
