<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
