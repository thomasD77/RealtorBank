<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Energy extends MainDropdownComponent
{
    //--> Custom
    public string $element = "energy";
    public string $title = "Energie";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getCookerTypes();
    }
}
