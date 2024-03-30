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
            'user_id' => Auth::id(),
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
            ['Kelder', RoomKey::Basement, Floor::where('code', FloorKey::BasementFloor )->first()->id, null],

            ['Inkomhal', RoomKey::EntranceHall->value, Floor::where('code', FloorKey::GroundFloor)->first()->id, 1],
            ['Toilet', RoomKey::Toilet->value, Floor::where('code', FloorKey::GroundFloor)->first()->id, 2],
            ['Woonkamer', RoomKey::LivingRoom->value, Floor::where('code', FloorKey::GroundFloor)->first()->id, 3],
            ['Keuken', RoomKey::Kitchen->value, Floor::where('code', FloorKey::GroundFloor)->first()->id, 4],
            ['Berging', RoomKey::Storage->value, Floor::where('code', FloorKey::GroundFloor)->first()->id, 5],
            ['Gang', RoomKey::NightHall->value, Floor::where('code', FloorKey::GroundFloor)->first()->id, 6],
            ['Badkamer', RoomKey::Bathroom->value, Floor::where('code', FloorKey::GroundFloor)->first()->id, 7],
            ['Slaapkamer', RoomKey::Bedroom->value, Floor::where('code', FloorKey::GroundFloor)->first()->id, 8],

            ['Nachthal', RoomKey::NightHall->value, Floor::where('code', FloorKey::UpperFloor)->first()->id, 1],
            ['Toilet', RoomKey::Toilet->value, Floor::where('code', FloorKey::UpperFloor)->first()->id, 2],
            ['Badkamer', RoomKey::Bathroom->value, Floor::where('code', FloorKey::UpperFloor)->first()->id, 3],
            ['Slaapkamer', RoomKey::Bedroom->value, Floor::where('code', FloorKey::UpperFloor)->first()->id, 4],
            ['Berging', RoomKey::Storage->value, Floor::where('code', FloorKey::UpperFloor)->first()->id, 5],

            ['Zolder', RoomKey::Attic->value, Floor::where('code', FloorKey::Attic)->first()->id, null],
            ['Garage', RoomKey::Garage->value, Floor::where('code', FloorKey::Garage)->first()->id, null],

            //Exterieur
            ['Gebouw', RoomKey::Building, Floor::where('code', FloorKey::Building )->first()->id, null],
            ['Aanleg', RoomKey::DriveWay, Floor::where('code', FloorKey::DriveWay )->first()->id, null],
            ['Voortuin', RoomKey::FrontYard, Floor::where('code', FloorKey::DriveWay )->first()->id, null],
            ['Tuin', RoomKey::Yard, Floor::where('code', FloorKey::DriveWay )->first()->id, null],
            ['Terras', RoomKey::Terrace, Floor::where('code', FloorKey::DriveWay )->first()->id, null],
            ['App terras', RoomKey::AppTerrace, Floor::where('code', FloorKey::DriveWay )->first()->id, null],

            //Bijgebouw
            ['Bijgebouw binnen', RoomKey::OutHouseIn, Floor::where('code', FloorKey::OutHouseIn )->first()->id, null],
            ['Bijgebouw buiten', RoomKey::OutHouseEx, Floor::where('code', FloorKey::OutHouseEx )->first()->id, null],
        ];

        $roomsToInsert = [];
        foreach ($rooms as $room) {
            $roomsToInsert[] = [
                'title' => $room[0],
                'code' => $room[1],
                'floor_id' => $room[2],
                'order' => $room[3],
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

        /**
        We need to set a limit because we can have duplicated values in this table
         */
        $areas = Area::take(6)->get();
        foreach ($rooms as $room){
            $areasToInsert = [];
            foreach ($areas as $area) {
                $areasToInsert[] = [
                    'order' => $area->order,
                    'sidebar_count' => 1,
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
         * We need to set a limit because we can have duplicated values in this table
         */
        $conforms = Conform::take(7)->get();

        //Thermostat was added later to te list, this is not ideal but yeah..,
        $thermostat = Conform::where('id', 23)->first();
        if ($thermostat) {
            $conforms->push($thermostat);
        }

        foreach ($rooms as $room){
            $conformsToInsert = [];
            foreach ($conforms as $conform) {

                //Default values
                $material = null;
                $color = null;
                $type = null;

                if($conform->code == "socket"){
                    $material = "kunststof";
                    $color = "wit";
                }elseif ($conform->code == "switches"){
                    $material = "kunststof";
                    $color = "wit";
                }elseif($conform->code == "lighting"){
                    $type = "wachtkabel met lamp";
                }

                $conformsToInsert[] = [
                    'conform_id' => $conform->id,
                    'room_id' => $room->id,
                    'floor_id' => $room->floor_id,
                    'inspection_id' => $inspection->id,
                    'material' => $material,
                    'color' => $color,
                    'type' => $type,
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

                    //Default values
                    $material = null;
                    $color = null;
                    $crane = null;
                    $siphon = null;
                    $model = null;

                    if($specific->code == "toilet"){
                        $material = "keramisch";
                        $color = "wit";
                    }elseif ($specific->code == "sink" && $specific->room_key == "kitchen"){
                        $material = "inox";
                        $crane = "mengkraan";
                        $siphon = "kunststof";
                    }elseif($specific->code == "sink" && $specific->room_key == "bathroom"){
                        $model = "bevestigd aan muur";
                        $color = "wit";
                        $crane = "mengkraan";
                        $siphon = "kunststof";
                    }

                    $specificsToInsert[] = [
                        'specific_id' => $specific->id,
                        'room_id' => $room->id,
                        'floor_id' => $room->floor_id,
                        'inspection_id' => $inspection->id,
                        'model' => $model,
                        'material' => $material,
                        'color' => $color,
                        'crane' => $crane,
                        'siphon' => $siphon,
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
            Keys::CommonDoor->value,
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
