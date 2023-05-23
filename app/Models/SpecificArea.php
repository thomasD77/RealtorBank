<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificArea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function specific()
    {
        return $this->belongsTo(Specific::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function media()
    {
        return $this->hasMany(MediaSpecific::class, 'specific_id');
    }

    public function damages()
    {
        return $this->hasMany(Damage::class, 'specific_id');
    }

    public static function getMaterials() :array
    {
        return $data = [
            'hout',
            'steen',
            'inox',
            'aluminium',
            'PVC',
            'staal',
            'chroom',
            'kunststof',
            'keramisch',
            'composiet',
            'laminaat',
            'melamine',
            'glas',
            'keramische tegel',
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

    public static function getHandrails() :array
    {
        return $data = [
            'muurbevestigd',
            'staand',
        ];
    }

    public static function getMailbox() :array
    {
        return $data = [
            'gleuf',
            'gleuf met bak',
            'ander',
        ];
    }

    public static function getPeepHols() :array
    {
        return $data = [
            'spion',
            'luikje',
            'ander',
        ];
    }

    public static function getPosition() :array
    {
        return $data = [
            'staand',
            'aan muur',
            'ander',
        ];
    }



    public static function getDorpels() :array
    {
        return $data = [
            'blauwe hardsteen',
            'natuursteen',
            'beton',
            'steen',
            'ander',
        ];
    }

    public static function getTypes() :array
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

    public static function getCupboardTypes() :array
    {
        return $data = [
            'met deuren',
            'met deuren en lades',
            'met lades',
            'open',
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

    public static function getTrapTypes() :array
    {
        return $data = [
            'plooitrap',
            'schuiftrap',
        ];
    }

    public static function getLights() :array
    {
        return $data = [
            'TL-lamp',
            'LED',
            'spaarlamp',
            'gloeilamp',
            'ander',
        ];
    }



    public static function getSinkModels() :array
    {
        return $data = [
            'in meubel',
            'bevestigd aan muur',
            'op zuil',
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

    public static function getStops() :array
    {
        return $data = [
            'ingebouwd',
            'rubberstop',
            'ander',
        ];
    }

    public static function getToiletTypes() :array
    {
        return $data = [
            'staand',
            'hangend',
            'ander',
        ];
    }

    public static function getSeating() :array
    {
        return $data = [
            'standaard',
            'slow close',
            'ander',
        ];
    }

    public static function getFirePlaceTypes() :array
    {
        return $data = [
            'open',
            'gesloten',
            'cassette',
            'kachel',
            'ander',
        ];
    }

    public static function getFirePlaceMaterials() :array
    {
        return $data = [
            'gietijzer',
            'metaal',
            'speksteen',
            'steen',
            'glas',
            'ander',
        ];
    }

    public static function getFirePlaceEnergies() :array
    {
        return $data = [
            'hout',
            'glas',
            'pellets',
            'petroleum',
            'ander',
        ];
    }

    public static function getDecorationFirePlaceMaterials() :array
    {
        return $data = [
            'gyproc',
            'gemetseld',
            'natuursteen',
            'hout',
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

    public static function getCookerBrands() :array
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

    public static function getSuctionTypes() :array
    {
        return $data = [
            'met afvoer',
            'luchtrecycling',
        ];
    }

    public static function getAppliancePosition() :array
    {
        return $data = [
            'inbouw',
            'opbouw',
            'vrijstaand',
        ];
    }

    public static function getBrands() :array
    {
        return $data = [
            'AEG',
            'ATAG',
            'Beko',
            'Bosh',
            'Ikea',
            'Miele',
            'Novy',
            'Pelgrim',
            'Siemens',
            'Smeg',
            'Whirlpool',
            'Zanussi',
            'ander',
        ];
    }

    public static function getSuctionFilter() :array
    {
        return $data = [
            'kunststof',
            'metaal',
            'koolstof',
            'ander',
        ];
    }

    public static function getCookerTypes() :array
    {
        return $data = [
            'elektrisch',
            'inductie',
            'gas',
            'ander',
        ];
    }

    public static function getOvenTypes() :array
    {
        return $data = [
            'traditioneel',
            'hetelucht',
            'microgolfoven',
            'stoomoven',
            'combi',
            'ander',
        ];
    }

    public static function getRefrigiatorTypes() :array
    {
        return $data = [
            'met vriesvak',
            'zonder vriesvak',
        ];
    }

    public static function getDischargePointTypes() :array
    {
        return $data = [
            'water',
            'condens',
        ];
    }

    public static function getShowerTypes() :array
    {
        return $data = [
            'inloopdouche',
            'cabine',
        ];
    }

    public static function getShowerModel() :array
    {
        return $data = [
            'douchekolom',
            'flexibel met glijstang',
            'regendouche met flexibel',
            'ander',
        ];
    }

    public static function getShowerCurtain() :array
    {
        return $data = [
            'douchegordijn',
            'glazen wand',
            'kunststof wand',
            'ander',
        ];
    }

    public static function getBathTypes() :array
    {
        return $data = [
            'ligbad',
            'zitbad',
            'jacuzzi',
        ];
    }

    public static function getHoses() :array
    {
        return $data = [
            'met slang',
            'vast',
            'regendouche',
        ];
    }

    public static function getIsolationTypes() :array
    {
        return $data = [
            'rotswol',
            'glaswol',
            'PUR',
            'ander',
        ];
    }

    public static function getIsolationPositions() :array
    {
        return $data = [
            'dak',
            'zoldervloer',
            'beide',
            'ander',
        ];
    }

    public static function getGarageDoorTypes() :array
    {
        return $data = [
            'kantelpoort',
            'sectionaalpoort',
            'rolpoort',
            'schuifpoort',
            'ander',
        ];
    }

    public static function getGarageDoorService() :array
    {
        return $data = [
            'handmatig',
            'elektrisch',
        ];
    }

    public static function getTypeCounts() :array
    {
        return $data = [
            'enkel',
            'dubbel',
        ];
    }

}
