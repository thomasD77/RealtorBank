<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Seat extends MainDropdownComponent
{
    //--> Custom
    public string $element = "seat";
    public string $title = "Zitting";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getSeating();
    }
}
