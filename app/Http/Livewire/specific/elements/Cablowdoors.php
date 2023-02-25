<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cablowdoors extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabLowDoors";
    public string $title = "Lage kasten - deuren";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
