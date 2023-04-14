<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Showerprotection extends MainDropdownComponent
{
    //--> Custom
    public string $element = "protection";
    public string $title = "Afscherming";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getShowerCurtain();

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
