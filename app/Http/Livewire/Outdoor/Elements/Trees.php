<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;

class Trees extends MainDropdownComponent
{
    //--> Custom
    public string $element = "trees";
    public string $title = "Bomen";

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
