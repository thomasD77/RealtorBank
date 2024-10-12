<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'damage_id',
        'category_pricing_id',
        'sub_category_pricing_id',
        'description',
        'cost_square_meter',
        'cost_hour',
        'cost_piece',
        'count',
        'total',
        'vetustate',
        'tax',
    ];

    public function damage()
    {
        return $this->belongsTo(Damage::class);
    }

    public function categoryPricing()
    {
        return $this->belongsTo(CategoryPricing::class, 'category_pricing_id');
    }

    public function subCategoryPricing()
    {
        return $this->belongsTo(SubCategoryPricing::class, 'sub_category_pricing_id');
    }
}
