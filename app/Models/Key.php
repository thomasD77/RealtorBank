<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function media()
    {
        return $this->hasMany(MediaKey::class);
    }

    public static function getTypes() :array
    {
        return $types = [
            'sleutel',
            'afstandbediening',
            'badge',
            'toeganscode',
            'ander',
        ];
    }
}
