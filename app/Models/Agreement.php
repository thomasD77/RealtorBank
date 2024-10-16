<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'situation_id',
        'pricing',
        'quote_id',
        'title',
        'date',
        'remarks',
        'signature_tenant',
        'signature_owner',
    ];

    // Define relationships if needed
    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
