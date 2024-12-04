<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'damage_id',
    ];

    /**
     * Relatie met Inspection model.
     */
    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }

    /**
     * Relatie met Damage model.
     */
    public function damage()
    {
        return $this->belongsTo(Damage::class);
    }
}
