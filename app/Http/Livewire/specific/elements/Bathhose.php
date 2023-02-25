<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Bathhose extends MainDropdownComponent
{
    //--> Custom
    public string $element = "shower";
    public string $title = "Douche slang";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getHoses();
    }
}
