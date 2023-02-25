<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cablowshelves extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabLowShelves";
    public string $title = "Lage kasten - legplanken";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
