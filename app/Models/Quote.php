<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'remarks',
        'total',
        'inspection_id',
        'situation_id'
    ];

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }
}
