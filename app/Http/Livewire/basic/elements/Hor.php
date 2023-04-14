<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Hor extends MainDropdownComponent
{
    //--> Custom
    public string $element = "hor";
    public string $title = "Hor";

    public function mount($dynamicArea )
    {
        //--> Custom
        $this->parameters = BasicArea::getHors();

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
