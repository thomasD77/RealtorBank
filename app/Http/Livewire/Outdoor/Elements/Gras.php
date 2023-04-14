<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;

class Gras extends MainDropdownComponent
{
    //--> Custom
    public string $element = "gras";
    public string $title = "Gras";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();

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
