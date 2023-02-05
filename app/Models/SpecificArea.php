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

    public static function getMaterials() :array
    {
        return $data = [
            'hout',
            'steen',
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

    public static function getHandrails() :array
    {
        return $data = [
            'muurbevestigd',
            'staand',
        ];
    }
}
