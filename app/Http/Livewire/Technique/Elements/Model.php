<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\TechniqueArea;
use Livewire\Component;

class Model extends MainDropdownComponent
{
    //--> Custom
    public string $element = "model";
    public string $title = "Model";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = TechniqueArea::getModels();

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
