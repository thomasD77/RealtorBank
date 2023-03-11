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
}
