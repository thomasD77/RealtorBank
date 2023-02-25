<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Stop extends MainDropdownComponent
{
    //--> Custom
    public string $element = "stop";
    public string $title = "Stop";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getStops();
    }
}
