<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCalculation extends Model
{
    use HasFactory;

    protected $fillable = ['count', 'total', 'tax', 'approved', 'vetustate'];

    public function calculation()
    {
        return $this->belongsTo(Calculation::class);
    }
}
