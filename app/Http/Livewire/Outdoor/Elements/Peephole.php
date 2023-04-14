<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Peephole extends MainDropdownComponent
{
    //--> Custom
    public string $element = "peepHole";
    public string $title = "Kijkgat";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getPeepHols();

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
