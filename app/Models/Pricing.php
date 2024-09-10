<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    // Definieer de relatie met CategoryPricing
    public function categoryPricing()
    {
        return $this->belongsTo(CategoryPricing::class, 'category_pricing_id');
    }

    public function subCategoryPricing()
    {
        return $this->belongsTo(SubCategoryPricing::class, 'sub_category_pricing_id');
    }
}
