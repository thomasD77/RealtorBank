<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\ConformArea;
use Livewire\Component;

class Colors extends MainDropdownComponent
{
    //--> Custom
    public string $element = "color";
    public string $title = "Kleuren";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = ConformArea::getColors();

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
