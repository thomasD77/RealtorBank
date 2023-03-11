<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\OutdoorArea;

class Brand extends MainDropdownComponent
{
    //--> Custom
    public string $element = "brand";
    public string $title = "Merk";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getBrands();
    }
}
