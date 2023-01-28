<?php

namespace App\Http\Controllers;

use App\Models\BasicArea;
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

    public function detail(Inspection $inspection, Room $room, BasicArea $area)
    {
       $blade = str_replace(' ', '-', strtolower($area->title));

        return view('basic-areas.' . $blade, [
            'inspection' =>$inspection,
            'room' => $room,
            'area' => $area
        ]);
    }
}
