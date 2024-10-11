<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDamage extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'invoice_id',
        'damage_id',
        'damage_title',
        'damage_date',
        'damage_description',
        'damage_print_pdf',
        'approved'
    ];

    /**
     * Relatie met Inspection model.
     */
    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }

    /**
     * Relatie met Invoice model.
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Relatie met Damage model.
     */
    public function damage()
    {
        return $this->belongsTo(Damage::class);
    }
}
