<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Handrail extends MainDropdownComponent
{
    //--> Custom
    public string $element = "handrail";
    public string $title = "Leuning";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getHandrails();
    }
}
