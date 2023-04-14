<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Thermostatbrand extends MainDropdownComponent
{
    //--> Custom
    public string $element = "brand";
    public string $title = "Merk";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getHeatingBrands();

        //--> Rendering 'Andere' text field
        $this->dynamicArea = $dynamicArea;
        $el = $this->element;
        if(in_array($this->dynamicArea->$el, $this->parameters)){
            $this->dynamic = null;
        }else {
            $this->dynamic = $this->dynamicArea->$el;
        }
    }
}
