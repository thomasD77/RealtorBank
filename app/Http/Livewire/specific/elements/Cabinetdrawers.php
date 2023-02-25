<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cabinetdrawers extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabinetDrawers";
    public string $title = "Bovenkasten - lades";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
