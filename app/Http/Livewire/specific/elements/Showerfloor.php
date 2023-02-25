<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Showerfloor extends MainDropdownComponent
{
    //--> Custom
    public string $element = "floor";
    public string $title = "Bodem";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getMaterials();
    }
}
