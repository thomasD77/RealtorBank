<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Material extends MainDropdownComponent
{
    //--> Custom
    public string $element = "material";
    public string $title = "Materiaal";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getMaterials();

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
