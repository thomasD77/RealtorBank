<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cablowdrawers extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabLowDrawers";
    public string $title = "Lage kasten - lades";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
