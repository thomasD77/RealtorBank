<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Plaster extends MainDropdownComponent
{
    //--> Custom
    public string $element = "plaster";
    public string $title = "Pleisterwerk";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getPlasters();
    }
}
