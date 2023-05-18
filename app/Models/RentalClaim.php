<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalClaim extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }
}
