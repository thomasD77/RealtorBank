<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryPricing extends Model
{
    use HasFactory;

    public function pricings()
    {
        return $this->hasMany(Pricing::class, 'category_pricing_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryPricing::class, 'category_pricing_id');
    }
}
