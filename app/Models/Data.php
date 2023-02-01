<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    public static function getAnalysis() :array
    {
        return $colors = [
            'slecht',
            'matig',
            'goed',
            'zeer goed',
        ];
    }

    public static function getPresent() :array
    {
        return $types = [
            'aanwezig',
            'afwezig',
        ];
    }
}
