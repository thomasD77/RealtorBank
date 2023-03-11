<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Parts extends MainDropdownComponent
{
    //--> Custom
    public string $element = "parts";
    public string $title = "Delen";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getParts();
    }
}
