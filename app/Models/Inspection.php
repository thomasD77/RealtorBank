<?php

namespace App\Models;

use App\Enums\FloorKey;
use App\Enums\Keys;
use App\Enums\MeterKey;
use App\Enums\RoomKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Inspection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function media()
    {
        return $this->hasMany(MediaInspection::class);
    }

    public function pdf()
    {
        return $this->hasMany(PDF::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function techniques()
    {
        return $this->hasMany(TechniqueArea::class, 'inspection_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'inspection_id');
    }

    public static function createInspection()
    {
        /**
         * Inspection
         *
         */
        $inspection = Inspection::create([
            //'user_id' => Auth::id(),
            'user_id' => 1,
        ]);

        /**
         * Address
         *
         */
        $address = Address::create([
            'inspection_id' => $inspection->id
        ]);

        /**
         * Rooms
         *
         */
        $rooms = [
            //Interieur
            ['Kelder', RoomKey::Basement, Floor::where('code', FloorKey::BasementFloor )->first()->id],
            ['Inkomhal', RoomKey::EntranceHall->value, Floor::where('code', FloorKey::GroundFloor)->first()->id],
            ['Toilet', RoomKey::Toilet->value, Floor::where('code', FloorKey::GroundFloor)->first()->id],
            ['Woonkamer', RoomKey::LivingRoom->value, Floor::where('code', FloorKey::GroundFloor)->first()->id],
            ['Keuken', RoomKey::Kitchen->value, Floor::where('code', FloorKey::GroundFloor)->first()->id],
            ['Badkamer', RoomKey::Bathroom->value, Floor::where('code', FloorKey::GroundFloor)->first()->id],
            ['Gang', RoomKey::NightHall->value, Floor::where('code', FloorKey::GroundFloor)->first()->id],
            ['Berging', RoomKey::Storage->value, Floor::where('code', FloorKey::GroundFloor)->first()->id],
            ['Slaapkamer', RoomKey::Bedroom->value, Floor::where('code', FloorKey::GroundFloor)->first()->id],
            ['Nachthal', RoomKey::NightHall->value, Floor::where('code', FloorKey::UpperFloor)->first()->id],
            ['Badkamer', RoomKey::Bathroom->value, Floor::where('code', FloorKey::UpperFloor)->first()->id],
            ['Slaapkamer', RoomKey::Bedroom->value, Floor::where('code', FloorKey::UpperFloor)->first()->id],
            ['Zolder', RoomKey::Attic->value, Floor::where('code', FloorKey::Attic)->first()->id],
            ['Garage', RoomKey::Garage->value, Floor::where('code', FloorKey::Garage)->first()->id],

            //Exterieur
            ['Gebouw', RoomKey::Building, Floor::where('code', FloorKey::Building )->first()->id],
            ['Aanleg', RoomKey::DriveWay, Floor::where('code', FloorKey::DriveWay )->first()->id],
            ['Voortuin', RoomKey::FrontYard, Floor::where('code', FloorKey::DriveWay )->first()->id],
            ['Tuin', RoomKey::Yard, Floor::where('code', FloorKey::DriveWay )->first()->id],
            ['Terras', RoomKey::Terrace, Floor::where('code', FloorKey::DriveWay )->first()->id],

            //Bijgebouw
            ['Bijgebouw binnen', RoomKey::OutHouseIn, Floor::where('code', FloorKey::OutHouseIn )->first()->id],
            ['Bijgebouw buiten', RoomKey::OutHouseEx, Floor::where('code', FloorKey::OutHouseEx )->first()->id],
        ];

        $roomsToInsert = [];
        foreach ($rooms as $room) {
            $roomsToInsert[] = [
                'title' => $room[0],
                'code' => $room[1],
                'floor_id' => $room[2],
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
            ->select([
                'title',
                'code',
                'floor_id',
                'id'
            ])->get();

        $areas = Area::all();
        foreach ($rooms as $room){
            $areasToInsert = [];
            foreach ($areas as $area) {
                $areasToInsert[] = [
                    'area_id' => $area->id,
                    'room_id' => $room->id,
                    'floor_id' => $room->floor_id,
                    'inspection_id' => $inspection->id,
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
                    'floor_id' => $room->floor_id,
                    'inspection_id' => $inspection->id,
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
                if($specific->room_key == $room->code){
                    $specificsToInsert[] = [
                        'specific_id' => $specific->id,
                        'room_id' => $room->id,
                        'floor_id' => $room->floor_id,
                        'inspection_id' => $inspection->id,
                        'created_at' => DB::raw('NOW()'),
                        'updated_at' => DB::raw('NOW()'),
                    ];
                }
            }
            SpecificArea::insert($specificsToInsert);
        }

        /**
         * Techniques
         *
         */
        $techniques = Technique::all();

        $techniquesToInsert = [];
        foreach ($techniques as $technique) {
            $techniquesToInsert[] = [
                'technique_id' => $technique->id,
                'inspection_id' => $inspection->id,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }
        TechniqueArea::insert($techniquesToInsert);


        /**
         * OutdoorArea
         *
         */
        $outdoors = Outdoor::all();
        foreach ($rooms as $room){
            $outdoorsToInsert = [];
            foreach ($outdoors as $outdoor) {
                if($outdoor->room_key == $room->code){
                    $outdoorsToInsert[] = [
                        'outdoor_id' => $outdoor->id,
                        'room_id' => $room->id,
                        'inspection_id' => $inspection->id,
                        'created_at' => DB::raw('NOW()'),
                        'updated_at' => DB::raw('NOW()'),
                    ];
                }
            }
            OutdoorArea::insert($outdoorsToInsert);
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


        /**
         * Keys
         *
         */
        $keys = [
            Keys::FrontDoor->value,
            Keys::BackDoor->value,
            Keys::Garage->value,
            Keys::Mailbox->value,
            Keys::Doors->value,
        ];

        $keysToInsert = [];
        foreach ($keys as $key) {
            $keysToInsert[] = [
                'title' => $key,
                'inspection_id' => $inspection->id,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }
        Key::insert($keysToInsert);

        /**
         * Meters
         *
         */
        $meters = [
            MeterKey::Single->value,
            MeterKey::DoubleDay->value,
            MeterKey::DoubleNight->value,
            MeterKey::ExclusiveNight->value,
            MeterKey::DigitalDay->value,
            MeterKey::DigitalNight->value,
            MeterKey::DigitalInjectionDay->value,
            MeterKey::DigitalInjectionNight->value,
            MeterKey::Water->value,
            MeterKey::Gas->value,
            MeterKey::Oil->value,
            MeterKey::Extra->value,
        ];

        $metersToInsert = [];
        foreach ($meters as $meter) {
            $metersToInsert[] = [
                'title' => $meter,
                'inspection_id' => $inspection->id,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }
        Meter::insert($metersToInsert);

        return $inspection;
    }

}
