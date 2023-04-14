<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Count extends MainDropdownComponent
{
    //--> Custom
    public string $element = "count";
    public string $title = "Aantal";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();

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
