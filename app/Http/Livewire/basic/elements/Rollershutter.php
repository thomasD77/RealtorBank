<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Rollershutter extends MainDropdownComponent
{
    //--> Custom
    public string $element = "rollerShutter";
    public string $title = "Rolluiken";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getRollShutters();

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
