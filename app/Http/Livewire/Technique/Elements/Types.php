<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\TechniqueArea;
use Livewire\Component;

class Types extends MainDropdownComponent
{
    //--> Custom
    public string $element = "type";
    public string $title = "Roof";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = TechniqueArea::getTypes();
    }
}
