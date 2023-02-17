<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Energy extends MainDropdownComponent
{
    //--> Custom
    public string $element = "energy";
    public string $title = "Energie";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getEnergies();
    }
}
