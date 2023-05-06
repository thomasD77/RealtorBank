<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechniqueArea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function technique()
    {
        return $this->belongsTo(Technique::class, 'technique_id');
    }

    public function media()
    {
        return $this->hasMany(MediaTechnique::class, 'technique_id');
    }

    public function damages()
    {
        return $this->hasMany(Damage::class, 'specific_id');
    }

    public static function getFuels() :array
    {
        return $data = [
            'aardgas',
            'elektriciteit',
            'stookolie',
            'ander',
        ];
    }

    public static function getBrands() :array
    {
        return $data = [
            'ACV',
            'ATAG',
            'BULEX',
            'Honeywell',
            'Junkers',
            'Valliant',
            'Viessmann',
        ];
    }

    public static function getModels() :array
    {
        return $data = [
            'wandboiler',
            'staand',
            'ander',
        ];
    }

    public static function getTypes() :array
    {
        return $data = [
            'autmatische',
            'smeltverzekering',
            'manueel',
            'elektrisch',
        ];
    }
}
