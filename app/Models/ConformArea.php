<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConformArea extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function conform()
    {
        return $this->belongsTo(Conform::class);
    }

    public static function getMaterials() :array
    {
        return $data = [
            'kunststof',
            'aluminium',
            'bakelliet',
            'inox',
            'ander',
        ];
    }

    public static function getColors() :array
    {
        return $data = [
            'wit',
            'gebroken wit',
            'grijs',
            'zwart',
            'ander',
        ];
    }

    public static function getBrands() :array
    {
        return $data = [
            'Niko',
            'Bticino',
            'Legrand',
            'merkloos',
            'ander',
        ];
    }

    public static function getTypes() :array
    {
        return $data = [
            'wachtkabel',
            'wachtkabel met lamp',
            'inbouwspots',
            'spots op armatuur',
            'luchter',
            'plafonnier',
            'led strip',
            'TL-lamp',
            'ander',
        ];
    }
}
