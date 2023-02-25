<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Colors extends MainDropdownComponent
{
    //--> Custom
    public string $element = "color";
    public string $title = "Kleuren";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getColors();
    }
}
