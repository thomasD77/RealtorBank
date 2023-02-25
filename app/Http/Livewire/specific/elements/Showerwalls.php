<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Showerwalls extends MainDropdownComponent
{
    //--> Custom
    public string $element = "walls";
    public string $title = "Wanden";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getMaterials();
    }
}
