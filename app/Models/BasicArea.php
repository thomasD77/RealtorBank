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
        return [
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
        return [
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
        return [
            'idem vloer',
            'zwart',
            'hout',
            'ander',
        ];
    }

    public static function getHandles() :array
    {
        return [
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
        return [
            'hout',
            'pvc',
            'aluminium',
            'staal',
            'ander',
        ];
    }

    public static function getPlasters() :array
    {
        return [
            'bepleisterd',
            'niet bepleisterd',
        ];
    }

    public static function getFinishes() :array
    {
        return [
            'geschilderd',
            'behangen',
            'betegeld',
            'bekleed',
            'ander',
        ];
    }

    public static function getGlazings() :array
    {
        return [
            'enkel',
            'dubbel',
            'driedubbel',
            'ander',
        ];
    }

    public static function getWindowsills() :array
    {
        return [
            'hout',
            'pvc',
            'tegel',
            'bepleisterd',
            'baksteen',
            'natuursteen',
            'ander',
        ];
    }

    public static function getRollShutters() :array
    {
        return [
            'hout',
            'pvc',
            'aluminium',
            'ander',
        ];
    }

    public static function getWindowDecorations() :array
    {
        return [
            'gordijnen',
            'lamellen',
            'stickers',
            'ander',
        ];
    }

    public static function getHors() :array
    {
        return [
            'op kader',
            'ingebouwd',
            'ander',
        ];
    }

    public static function getFallProtections() :array
    {
        return [
            'metaal',
            'glas',
            'ander',
        ];
    }

    public static function getEnergies() :array
    {
        return [
            'CV',
            'elektriciteit',
            'kolen',
            'hout',
            'gas',
            'pallets',
            'ander',
        ];
    }

    public static function getTypes() :array
    {
        return [
            'standaard',
            'verlaagd',
            'spanplafond',
            'ander',
        ];
    }

}
