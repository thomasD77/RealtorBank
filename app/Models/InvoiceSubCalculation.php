<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSubCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_calculation_id',
        'invoice_category_pricing_id',
        'invoice_sub_category_pricing_id',
        'invoice_description',
        'invoice_cost_square_meter',
        'invoice_cost_hour',
        'invoice_cost_piece',
        'invoice_count',
        'invoice_total',
        'invoice_vetustate',
        'invoice_tax',
        'approved'
    ];

    /**
     * Relatie met InvoiceCalculation model.
     */
    public function invoiceCalculation()
    {
        return $this->belongsTo(InvoiceCalculation::class);
    }

    /**
     * Relatie met InvoiceCategoryPricing model.
     */
    public function invoiceCategoryPricing()
    {
        return $this->belongsTo(CategoryPricing::class);
    }

    /**
     * Relatie met InvoiceSubCategoryPricing model.
     */
    public function invoiceSubCategoryPricing()
    {
        return $this->belongsTo(SubCategoryPricing::class);
    }
}
