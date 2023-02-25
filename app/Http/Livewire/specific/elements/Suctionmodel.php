<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Suctionmodel extends MainDropdownComponent
{
    //--> Custom
    public string $element = "model";
    public string $title = "Model";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getAppliancePosition();
    }
}
