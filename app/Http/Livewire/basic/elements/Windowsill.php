<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Windowsill extends MainDropdownComponent
{
    //--> Custom
    public string $element = "windowsill";
    public string $title = "Vensterbank";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getWindowsills();
    }
}
