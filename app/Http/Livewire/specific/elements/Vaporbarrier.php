<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Vaporbarrier extends MainDropdownComponent
{
    //--> Custom
    public string $element = "vaporBarrier";
    public string $title = "Dampscherm";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();

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
