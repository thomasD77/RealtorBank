<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Lock extends MainDropdownComponent
{
    //--> Custom
    public string $element = "lock";
    public string $title = "Slot";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getLocks();
    }
}
