<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Service extends MainDropdownComponent
{
    //--> Custom
    public string $element = "service";
    public string $title = "Bediening";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getGarageDoorService();

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
