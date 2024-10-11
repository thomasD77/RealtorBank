<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDamage extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'basic_id',
        'specific_id',
        'conform_id',
        'general_id',
        'technique_id',
        'outdoor_id',
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
     * Relatie met Basic model.
     */
    public function basicArea()
    {
        return $this->belongsTo(BasicArea::class, 'basic_id');
    }

    /**
     * Relatie met Specific model.
     */
    public function specificArea()
    {
        return $this->belongsTo(SpecificArea::class, 'specific_id');
    }

    /**
     * Relatie met Conform model.
     */
    public function conformArea()
    {
        return $this->belongsTo(ConformArea::class, 'conform_id');
    }

    /**
     * Relatie met General model.
     */
    public function general()
    {
        return $this->belongsTo(General::class, 'general_id');
    }

    /**
     * Relatie met Technique model.
     */
    public function techniqueArea()
    {
        return $this->belongsTo(TechniqueArea::class, 'technique_id');
    }

    /**
     * Relatie met Outdoor model.
     */
    public function outdoorArea()
    {
        return $this->belongsTo(OutdoorArea::class, 'outdoor_id');
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
