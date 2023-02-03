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
}
