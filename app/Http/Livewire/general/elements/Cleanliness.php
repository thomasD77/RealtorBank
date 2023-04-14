<?php

namespace App\Http\Livewire\General\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cleanliness extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cleanliness";
    public string $title = "Netheid";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getStatus();

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
