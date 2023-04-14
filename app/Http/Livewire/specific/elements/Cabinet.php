<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cabinet extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabinet";
    public string $title = "Bovenkasten";

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
