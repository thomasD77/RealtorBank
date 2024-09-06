<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class canopylight extends MainDropdownComponent
{
    //--> Custom
    public string $element = "canopyLight";
    public string $title = "Verlichting";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getCanopyLights();

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
