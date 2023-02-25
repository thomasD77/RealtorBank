<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Cupboardtypes extends MainDropdownComponent
{
    //--> Custom
    public string $element = "type";
    public string $title = "Type";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getCupboardTypes();
    }
}
