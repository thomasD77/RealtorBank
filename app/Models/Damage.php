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

    public function situations()
    {
        return $this->belongsToMany(Situation::class, 'damages_situations')->withPivot('print_pdf', 'archived');
    }

    public function media()
    {
        return $this->hasMany(MediaDamages::class, 'damage_id');
    }

    public function calculations()
    {
        return $this->hasMany(Calculation::class, 'damage_id');
    }
}
