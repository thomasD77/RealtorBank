<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteSubCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_calculation_id',
        'category_pricing_id',
        'sub_category_pricing_id',
        'quote_description',
        'quote_cost_square_meter',
        'quote_cost_hour',
        'quote_cost_piece',
        'quote_count',
        'quote_total',
        'quote_vetustate',
        'quote_tax',
        'approved'
    ];

    /**
     * Relatie met InvoiceCalculation model.
     */
    public function calculation()
    {
        return $this->belongsTo(Calculation::class, 'quote_calculation_id');
    }

    /**
     * Relatie met InvoiceCategoryPricing model.
     */
    public function categoryPricing()
    {
        return $this->belongsTo(CategoryPricing::class);
    }

    /**
     * Relatie met InvoiceSubCategoryPricing model.
     */
    public function subCategoryPricing()
    {
        return $this->belongsTo(SubCategoryPricing::class);
    }
}
