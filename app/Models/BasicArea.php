<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicArea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public static function getMaterials() :array
    {
        return $materials = [
            'keramische tegel',
            'tegel',
            'parket',
            'laminaat',
            'beton',
            'OSB',
            'epoxy',
            'plancher',
            'tapijt',
            'linoleum',
            'vinyl',
            'pleister',
            'baksteen',
            'gyproc',
            'hout',
            'beton',
            'metaal',
            'kunststof',
            'schilderdeur',
            'glazendeur',
            'massief',
            'beton',
            'aluminium',
            'beton',
            'gietijzer',
            'plaatstaal',
            'speksteen',
            'keramisch',
            'ander',
        ];
    }

    public static function getColors() :array
    {
        return $colors = [
            'zwart',
            'grijs',
            'wit',
            'beige',
            'gebroken wit',
            'bruin',
            'hout',
        ];
    }

    public static function getPlinths() :array
    {
        return $plinths = [
            'idem vloer',
            'zwart',
            'hout',
            'ander',
        ];
    }

    public static function getTypes() :array
    {
        return $types = [
            'standaard',
            'verlaagd',
            'spanplafond',
            'ander',
        ];
    }

    public static function getHandles() :array
    {
        return $types = [
            'aluminium',
            'inox',
            'koper',
            'pvc',
            'hout',
            'ander',
        ];
    }

    public static function getLists() :array
    {
        return $types = [
            'hout',
            'pvc',
            'aluminium',
            'staal',
            'ander',
        ];
    }

}
