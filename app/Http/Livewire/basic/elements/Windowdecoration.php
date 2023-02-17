<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Windowdecoration extends MainDropdownComponent
{
    //--> Custom
    public string $element = "windowDecoration";
    public string $title = "Raamdecoratie";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getWindowDecorations();
    }
}
