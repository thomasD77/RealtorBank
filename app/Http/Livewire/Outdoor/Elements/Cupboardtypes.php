<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Cupboardtypes extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cupboard_model";
    public string $title = "Model";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getCupboardTypes();

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
