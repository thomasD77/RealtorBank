<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Doors extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cupboard_doors";
    public string $title = "Deuren";

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
