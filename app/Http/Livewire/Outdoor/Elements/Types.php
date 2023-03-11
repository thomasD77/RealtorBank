<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Types extends MainDropdownComponent
{
    //--> Custom
    public string $element = "type";
    public string $title = "Type";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getPositions();
    }
}
