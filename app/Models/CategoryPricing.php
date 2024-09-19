<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPricing extends Model
{
    use HasFactory;

    public function pricings()
    {
        return $this->hasMany(Pricing::class, 'category_pricing_id');
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategoryPricing::class, 'category_pricing_id');
    }
}
