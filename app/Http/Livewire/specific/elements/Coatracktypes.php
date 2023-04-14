<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Coatracktypes extends MainDropdownComponent
{
    //--> Custom
    public string $element = "type";
    public string $title = "type";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getPosition();

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
