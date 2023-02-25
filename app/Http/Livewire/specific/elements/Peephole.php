<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Peephole extends MainDropdownComponent
{
    //--> Custom
    public string $element = "peepHole";
    public string $title = "Kijkgat";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getPeepHols();
    }
}
