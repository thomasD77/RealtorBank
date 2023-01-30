<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Inspections extends Component
{

    public function addInspection()
    {
        $inspection = Inspection::create([
            'user_id' => Auth::id(),
        ]);

        $rooms = [
            'Kelder',
            'Gelijkvloers',
            'Toilet',
            'Woonkamer',
            'Keuken',
            'Badkamer',
            'Nacht hall',
            'Berging',
            'Slaapkamer',
        ];

        $roomsToInsert = [];
        foreach ($rooms as $room) {
            $roomsToInsert[] = [
                'title' => $room,
                'inspection_id' => $inspection->id,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }
        Room::insert($roomsToInsert);



        //Basic Areas
        $rooms = Room::query()
            ->where('inspection_id', $inspection->id)
            ->select(['title', 'id'])
            ->get();


        $areas = Area::all();

        foreach ($rooms as $room){
            $areasToInsert = [];
            foreach ($areas as $area) {
                $areasToInsert[] = [
                    'area_id' => $area->id,
                    'room_id' => $room->id,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()'),
                ];
            }
            BasicArea::insert($areasToInsert);
        }







    }

    public function render()
    {
        $inspections = Inspection::query()
            ->where('user_id', Auth::id())
            ->get();

        return view('livewire.inspections', [
            'inspections' => $inspections
        ]);
    }
}
