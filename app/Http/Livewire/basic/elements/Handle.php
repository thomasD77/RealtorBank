<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Handle extends MainDropdownComponent
{
    //--> Custom
    public string $element = "handle";
    public string $title = "Klink";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getHandles();
    }
}
