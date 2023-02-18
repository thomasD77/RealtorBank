<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\ConformArea;
use Livewire\Component;

class  Brand extends MainDropdownComponent
{
    //--> Custom
    public string $element = "brand";
    public string $title = "Merk";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = ConformArea::getBrands();
        $this->dynamicArea = $dynamicArea;
    }
}
