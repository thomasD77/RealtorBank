<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'quote_damage_id',
        'quote_brutto_total',
        'quote_vetustate',
        'quote_vetustate_amount',
        'quote_final_total',
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
        return $this->belongsTo(QuoteDamage::class, 'quote_damage_id');
    }
}
