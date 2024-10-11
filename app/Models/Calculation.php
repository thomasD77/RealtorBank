<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $fillable = ['damage_id', 'inspection_id'];

    public function subCalculations()
    {
        return $this->hasMany(SubCalculation::class);
    }

    public function categoryPricing()
    {
        return $this->belongsTo(CategoryPricing::class, 'category_pricing_id');
    }

    public function subCategoryPricing()
    {
        return $this->belongsTo(SubCategoryPricing::class, 'sub_category_pricing_id');
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class, 'pricing_id');
    }

    public function damage()
    {
        return $this->belongsTo(Damage::class);
    }
}
