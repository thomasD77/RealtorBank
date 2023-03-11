<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;

class Movementdetector extends MainDropdownComponent
{
    //--> Custom
    public string $element = "movementDetector";
    public string $title = "Bewegingsdetector";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
