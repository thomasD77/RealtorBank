<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cabinetdoors extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabinetDoors";
    public string $title = "Bovenkasten - deuren";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
