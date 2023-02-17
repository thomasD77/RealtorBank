<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Doorstop extends MainDropdownComponent
{
    //--> Custom
    public string $element = "doorStop";
    public string $title = "Deur stop";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
