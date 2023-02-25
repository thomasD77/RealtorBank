<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cabinetshelves extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabinetShelves";
    public string $title = "Bovenkasten - legplanken";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
