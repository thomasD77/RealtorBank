<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Glazing extends MainDropdownComponent
{
    //--> Custom
    public string $element = "glazing";
    public string $title = "Beglazing";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getGlazings();

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
