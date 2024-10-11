<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function media()
    {
        return $this->hasMany(MediaGeneral::class, 'general_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function damages()
    {
        return $this->hasMany(Damage::class, 'general_id');
    }
}
