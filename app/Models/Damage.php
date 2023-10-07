<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Damage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function media()
    {
        return $this->hasMany(MediaDamages::class, 'damage_id');
    }
}
