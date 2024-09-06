<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class canopyswitch extends MainDropdownComponent
{
    //--> Custom
    public string $element = "canopySwitch";
    public string $title = "Bediening";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getCanopySwitch();

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
