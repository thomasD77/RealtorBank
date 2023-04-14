<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Lighting extends MainDropdownComponent
{
    //--> Custom
    public string $element = "lighting";
    public string $title = "Verlichting";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getLights();

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
