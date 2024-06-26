<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Plaster extends MainDropdownComponent
{
    //--> Custom
    public string $element = "plaster";
    public string $title = "Pleisterwerk";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getPlasters();

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
