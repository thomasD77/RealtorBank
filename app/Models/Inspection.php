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

        return $inspection;
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
