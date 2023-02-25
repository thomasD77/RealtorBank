<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Rinse extends MainDropdownComponent
{
    //--> Custom
    public string $element = "rinse";
    public string $title = "Spoeling";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getTypeCounts();
    }
}
