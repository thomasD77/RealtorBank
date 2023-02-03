<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'basic_area_id',
        'spec_area_id',
        'conform_area_id',
        'user_id'
    ];

    public static function createInspection()
    {
        /**
         * Inspection
         *
         */
        $inspection = Inspection::create([
            'user_id' => Auth::id(),
        ]);


        /**
         * Rooms
         *
         */
        $rooms = [
            'Kelder',
            'Gelijkvloers',
            'Toilet',
            'Woonkamer',
            'Keuken',
            'Badkamer',
            'Nachthal',
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


        /**
         * BasicArea
         *
         */
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


        /**
         * Conforms
         *
         */
        $conforms = Conform::all();
        foreach ($rooms as $room){
            $conformsToInsert = [];
            foreach ($conforms as $conform) {
                $conformsToInsert[] = [
                    'conform_id' => $conform->id,
                    'room_id' => $room->id,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()'),
                ];
            }
            ConformArea::insert($conformsToInsert);
        }


        return $inspection;
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
