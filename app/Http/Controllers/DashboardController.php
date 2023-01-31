<?php

namespace App\Http\Controllers;

use App\Models\Area;
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
        return view('basic-areas.form', [
            'inspection' => $inspection,
            'room' => $room,
            'area' => $area
        ]);
    }
}
