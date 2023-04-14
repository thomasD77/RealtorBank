<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\TechniqueArea;
use Livewire\Component;

class Fuel extends MainDropdownComponent
{
    //--> Custom
    public string $element = "fuel";
    public string $title = "Brandstof";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = TechniqueArea::getFuels();

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
