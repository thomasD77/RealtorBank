<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutdoorArea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function outdoor()
    {
        return $this->belongsTo(Outdoor::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function media()
    {
        return $this->hasMany(MediaOutdoor::class, 'outdoor_id');
    }

    public function damages()
    {
        return $this->hasMany(Damage::class, 'outdoor_id');
    }

    public static function getMaterials() :array
    {
        return $data = [
            'baksteen',
            'beton',
            'sierplijster',
            'metselwerk',
            'inox',
            'aluminium',
            'natuursteen',
            'hout',
            'steen',
            'asfalt',
            'tegels',
            'kasseien',
            'klinkers',
            'kiezels',
            'ander',
        ];
    }

    public static function getFinishes() :array
    {
        return $data = [
            'geschilderd',
            'behangen',
            'betegeld',
            'bekleed',
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
            'gemarmerd',
            'houtkleur',
            'ander',
        ];
    }

    public static function getRoofs() :array
    {
        return $data = [
            'plat',
            'zadeldak',
            'lessenaarsdak',
            'mansardedak',
            'ander',
        ];
    }

    public static function getFooths() :array
    {
        return $data = [
            'dakpannen',
            'leien',
            'riet',
            'zink',
            'roofing/ epdm',
            'ander'
        ];
    }

    public static function getLocks() :array
    {
        return $data = [
            'cylinder',
            'code',
            'grendel',
            'draaislot',
            'ander',
        ];
    }

    public static function getHandrails() :array
    {
        return $data = [
            'muurbevestigd',
            'staand',
        ];
    }

    public static function getPositions() :array
    {
        return $data = [
            'muurbevestigd',
            'staand',
            'Inbouw',
            'vrijstaand',
            'ander',
        ];
    }

    public static function getGates() :array
    {
        return $data = [
            'schuifpoort',
            'opendraaiend',
            'ander',
        ];
    }

    public static function getParts() :array
    {
        return $data = [
            'enkel',
            'dubbel',
            'ander',
        ];
    }

    public static function getFences() :array
    {
        return $data = [
            'volle muur',
            'scherm',
            'hekwerk',
            'gaas',
            'draad',
            'ander',
        ];
    }

    public static function getOutdoorLights() :array
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

    public static function getCranes() :array
    {
        return $data = [
            'enkelvoudig',
            'mengkraan',
            'thermostatisch',
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




}
