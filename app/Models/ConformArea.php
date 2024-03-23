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

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function media()
    {
        return $this->hasMany(MediaConform::class, 'conform_id');
    }

    public function damages()
    {
        return $this->hasMany(Damage::class, 'conform_id');
    }

    public static function getMaterials() :array
    {
        return $data = [
            'kunststof',
            'PVC',
            'aluminium',
            'bakeliet',
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

    public static function getTypesThermostat() :array
    {
        return $data = [
            'elektrisch',
            'digitaal',
            'mechanisch',
            'ander',
        ];
    }

    public static function getModels() :array
    {
        return $data = [
            'vast',
            'draadloos',
            'losstaand',
            'ander',
        ];
    }

    public static function getHeatingBrands() :array
    {
        return $data = [
            'Bosh',
            'Honeywell',
            'Junkers',
            'Nest',
            'Siemens',
            'Vaillant',
            'Viessman',
            'ander',
        ];
    }
}
