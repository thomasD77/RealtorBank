<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Handrail extends MainDropdownComponent
{
    //--> Custom
    public string $element = "handrail";
    public string $title = "Leuning";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getHandrails();

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
