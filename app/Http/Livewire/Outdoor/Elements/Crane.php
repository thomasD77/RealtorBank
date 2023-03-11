<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Crane extends MainDropdownComponent
{
    //--> Custom
    public string $element = "crane";
    public string $title = "Kranen";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getCranes();
    }
}
