<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Colors extends MainDropdownComponent
{
    //--> Custom
    public string $element = "color";
    public string $title = "Kleuren";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getColors();
    }
}
