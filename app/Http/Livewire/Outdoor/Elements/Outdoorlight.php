<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Outdoorlight extends MainDropdownComponent
{
    //--> Custom
    public string $element = "type";
    public string $title = "Type";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getOutdoorLights();

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
