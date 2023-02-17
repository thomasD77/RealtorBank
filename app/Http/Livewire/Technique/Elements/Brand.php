<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\TechniqueArea;
use Livewire\Component;

class Brand extends MainDropdownComponent
{
    //--> Custom
    public string $element = "brand";
    public string $title = "Merk";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = TechniqueArea::getBrands();
    }
}
