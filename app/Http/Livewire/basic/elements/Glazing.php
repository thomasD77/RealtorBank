<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Glazing extends MainDropdownComponent
{
    //--> Custom
    public string $element = "glazing";
    public string $title = "Beglazing";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getGlazings();
    }
}
