<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Isolationposition extends MainDropdownComponent
{
    //--> Custom
    public string $element = "position";
    public string $title = "Plaats";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getIsolationPositions();
    }
}
