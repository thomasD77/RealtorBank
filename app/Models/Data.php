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

    public static function getAnswer() :array
    {
        return $data = [
            'ja',
            'nee',
        ];
    }

    public static function getNumbers() :array
    {
        return $data = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            'ander',
        ];
    }

    public static function getStatus() :array
    {
        return $data = [
            'OK',
            'niet OK',
        ];
    }
}
