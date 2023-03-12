<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Handle extends MainDropdownComponent
{
    //--> Custom
    public string $element = "handle";
    public string $title = "Klink";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getMaterials();
    }
}
