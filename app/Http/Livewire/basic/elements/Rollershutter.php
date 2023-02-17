<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Rollershutter extends MainDropdownComponent
{
    //--> Custom
    public string $element = "rollerShutter";
    public string $title = "Rolluiken";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getRollShutters();
    }
}
