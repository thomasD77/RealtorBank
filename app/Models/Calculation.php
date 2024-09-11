<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    public function categoryPricing()
    {
        return $this->belongsTo(CategoryPricing::class, 'category_pricing_id');
    }

    public function subCategoryPricing()
    {
        return $this->belongsTo(SubCategoryPricing::class, 'sub_category_pricing_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }
}
