<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Situation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'situation_id');
    }

    public function damages()
    {
        return $this->belongsToMany(Damage::class)->withPivot('print_pdf', 'archived');
    }

    public function media()
    {
        return $this->hasMany(MediaSituation::class, 'situation_id');
    }
}
