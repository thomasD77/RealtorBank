<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Balustrade extends MainDropdownComponent
{
    //--> Custom
    public string $element = "balustrade";
    public string $title = "Balustrade";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getMaterials();

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
