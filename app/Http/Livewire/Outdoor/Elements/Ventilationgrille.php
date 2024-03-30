<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use App\Models\Data;
use Livewire\Component;

class Ventilationgrille extends MainDropdownComponent
{
    //--> Custom
    public string $element = "ventilationGrille";
    public string $title = "Ventilatie rooster";

    public function mount($dynamicArea )
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
