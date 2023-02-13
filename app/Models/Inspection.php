<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Inspection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function medias()
    {
        return $this->hasMany(MediaInspection::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public static function createInspection()
    {
        /**
         * Owner
         *
         */
        $owner = Owner::create([
            'country' => 'Belgium'
        ]);

        /**
         * Inspection
         *
         */
        $inspection = Inspection::create([
            'user_id' => Auth::id(),
            'owner_id' => $owner->id,
        ]);

        /**
         * Rooms
         *
         */
        $rooms = [
            ['Kelder', 'basement'],
            ['Inkomhal', 'entranceHall'],
            ['Toilet', 'toilet'],
            ['Woonkamer', 'livingRoom'],
            ['Keuken', 'kitchen'],
            ['Badkamer', 'bathroom'],
            ['Nachthal', 'nightHall'],
            ['Berging', 'storage'],
            ['Slaapkamer', 'bedroom'],
        ];
        $roomsToInsert = [];
        foreach ($rooms as $room) {
            $roomsToInsert[] = [
                'title' => $room[0],
                'code' => $room[1],
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


        /**
         * Specifics
         *
         */
        $specifics = Specific::all();

        foreach ($rooms as $room){
            $specificsToInsert = [];
            foreach ($specifics as $specific) {
                if($specific->room_key == $room->title){
                    $specificsToInsert[] = [
                        'specific_id' => $specific->id,
                        'room_id' => $room->id,
                        'created_at' => DB::raw('NOW()'),
                        'updated_at' => DB::raw('NOW()'),
                    ];
                }
            }
            SpecificArea::insert($specificsToInsert);
        }

        /**
         * General forms
         *
         */
        $generalToInsert = [];
        foreach ($rooms as $room){
            $generalToInsert[] = [
                'inspection_id' => $inspection->id,
                'room_id' => $room->id,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }
        General::insert($generalToInsert);

        return $inspection;
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
