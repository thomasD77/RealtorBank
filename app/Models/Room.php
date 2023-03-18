<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

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

}
