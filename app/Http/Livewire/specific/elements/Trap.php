<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Trap extends MainDropdownComponent
{
    //--> Custom
    public string $element = "trap";
    public string $title = "Trap";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getTrapTypes();
    }
}
