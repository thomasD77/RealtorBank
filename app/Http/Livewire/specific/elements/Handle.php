<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Handle extends MainDropdownComponent
{
    //--> Custom
    public string $element = "handle";
    public string $title = "Klink";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getMaterials();

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
