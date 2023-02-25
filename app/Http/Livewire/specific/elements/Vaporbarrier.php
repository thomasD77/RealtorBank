<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Vaporbarrier extends MainDropdownComponent
{
    //--> Custom
    public string $element = "vaporBarrier";
    public string $title = "Dampscherm";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
