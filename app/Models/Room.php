<?php

namespace App\Models;

use App\Enums\FloorKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public static function itemUp($room)
    {
        //Find upperRoom and reset order
        $upperRoomOrder = $room['order'] -= 1;
        //Find the correct floor
        if($room['floor_id'] == Floor::where('code', FloorKey::GroundFloor)->first()->id){
            $upperRoom = Room::where('order',$upperRoomOrder)
                ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
                ->first();
        }else {
            $upperRoom = Room::where('order',$upperRoomOrder)
                ->where('floor_id', Floor::where('code', FloorKey::UpperFloor)->first()->id)
                ->first();
        }

        if($upperRoom){
            $upperRoom->order += 1;
            $upperRoom->update();

            //Change order requested room
            $room = Room::find($room['id']);
            $room->order -= 1;
            $room->update();
        }
    }

    public static function itemDown($room)
    {
        //Find upperRoom and reset order
        $downRoomOrder = $room['order'] += 1;

        //Find the correct floor
        if($room['floor_id'] == Floor::where('code', FloorKey::GroundFloor)->first()->id){
            $downRoom = Room::where('order',$downRoomOrder)
                ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
                ->first();
        }else {
            $downRoom = Room::where('order',$downRoomOrder)
                ->where('floor_id', Floor::where('code', FloorKey::UpperFloor)->first()->id)
                ->first();
        }

        $downRoom->order -= 1;
        $downRoom->save();

        //Change order requested room
        $room = Room::find($room['id']);
        $room->order += 1;
        $room->save();
    }

    public function basicAreas()
    {
        return $this->hasMany(BasicArea::class);
    }

    public function conformAreas()
    {
        return $this->hasMany(ConformArea::class);
    }

    public function specificAreas()
    {
        return $this->hasMany(SpecificArea::class);
    }

    public function outdoorAreas()
    {
        return $this->hasMany(OutdoorArea::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function generalArea()
    {
        return $this->hasOne(General::class);
    }

    public function damages()
    {
        return $this->hasMany(Damage::class, 'general_id');
    }

}
