<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Anglecrane extends MainDropdownComponent
{
    //--> Custom
    public string $element = "angleCrane";
    public string $title = "Hoekkraan";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getCranes();
    }
}
