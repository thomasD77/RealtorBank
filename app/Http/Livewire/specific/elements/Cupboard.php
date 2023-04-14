<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cupboard extends MainDropdownComponent
{
    //--> Custom
    public string $element = "analysis";
    public string $title = "Analyse";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getAnalysis();

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
