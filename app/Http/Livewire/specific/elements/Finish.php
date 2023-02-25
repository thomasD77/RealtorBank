<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Finish extends MainDropdownComponent
{
    //--> Custom
    public string $element = "finish";
    public string $title = "Afwerking";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getFinishes();
    }
}
