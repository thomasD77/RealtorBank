<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Conform;
use App\Models\ConformArea;
use App\Models\Contract;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Outdoor;
use App\Models\OutdoorArea;
use App\Models\Room;
use App\Models\Situation;
use App\Models\Specific;
use App\Models\SpecificArea;
use App\Models\Technique;
use App\Models\TechniqueArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        $inspectionsCount = Inspection::where('user_id', Auth::id())->count();
        $inspectinIds = Inspection::where('user_id', Auth::id())->pluck('id');

        $situations = Situation::whereIn('inspection_id', $inspectinIds)->count();
        $contracts = Contract::whereIn('inspection_id', $inspectinIds)->where('lock', 1)->count();

        $pdfs = \App\Models\PDF::query()
            ->whereIn('inspection_id', $inspectinIds)
            ->latest()
            ->take(5)
            ->get();

        $inspections = Inspection::query()
            ->where('user_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', [
            'inspections' =>  $inspections,
            'inspectionsCount' => $inspectionsCount,
            'situations' => $situations,
            'contracts' => $contracts,
            'pdfs' => $pdfs
        ]);
    }

    public function detail(Inspection $inspection, Room $room, Area $area): View
    {
        $basicArea = BasicArea::query()
            ->with('area')
            ->where('room_id', $room->id)
            ->where('area_id', $area->id)
            ->first();

        //Set value for selected area in sidebar
        $user = Auth()->user();
        $user->sidebar_area_id = $area->id;
        $user->update();

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
            ->with('conform')
            ->where('room_id', $room->id)
            ->where('conform_id', $conform->id)
            ->first();

        //Set value for selected area in sidebar
        $user = Auth()->user();
        $user->sidebar_area_id = $conform->id;
        $user->update();


        return view('conform-areas.template', [
            'inspection' => $inspection,
            'room' => $room,
            'conform' => $conform,
            'conformArea' => $conformArea,
        ]);
    }

    public function specific(Inspection $inspection, Room $room, Specific $specific): View
    {
        $specificArea = SpecificArea::query()
            ->with('specific')
            ->where('room_id', $room->id)
            ->where('specific_id', $specific->id)
            ->first();

        //Set value for selected area in sidebar
        $user = Auth()->user();
        $user->sidebar_area_id = $specific->id;
        $user->update();


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
            ->with('technique')
            ->where('inspection_id', $inspection->id)
            ->where('technique_id', $technique->id)
            ->first();

        //Set value for selected area in sidebar
        $user = Auth()->user();
        $user->sidebar_area_id = $technique->id;
        $user->update();


        return view('technique-areas.template', [
            'inspection' => $inspection,
            'technique' => $technique,
            'techniqueArea' => $techniqueArea
        ]);
    }

    public function outdoor(Inspection $inspection, Outdoor $outdoor): View
    {
        $outdoorArea = OutdoorArea::query()
            ->with('outdoor')
            ->where('inspection_id', $inspection->id)
            ->where('outdoor_id', $outdoor->id)
            ->first();

        //Set value for selected area in sidebar
        $user = Auth()->user();
        $user->sidebar_area_id = $outdoor->id;
        $user->update();


        return view('outdoor-areas.template', [
            'inspection' => $inspection,
            'outdoor' => $outdoor,
            'outdoorArea' => $outdoorArea
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
