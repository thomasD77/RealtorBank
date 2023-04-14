<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Plinths extends MainDropdownComponent
{
    //--> Custom
    public string $element = "plinth";
    public string $title = "Plinten";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getPlinths();

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
