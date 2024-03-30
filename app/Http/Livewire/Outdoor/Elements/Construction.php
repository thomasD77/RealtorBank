<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Construction extends MainDropdownComponent
{
    //--> Custom
    public string $element = "construction";
    public string $title = "Opbouw";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getConstruction();

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
