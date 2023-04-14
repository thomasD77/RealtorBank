<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Window extends MainDropdownComponent
{
    //--> Custom
    public string $element = "window";
    public string $title = "Raam";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getDirection();

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
