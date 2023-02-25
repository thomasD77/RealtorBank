<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Isolationmaterial extends MainDropdownComponent
{
    //--> Custom
    public string $element = "material";
    public string $title = "Materialen";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getIsolationTypes();
    }
}
