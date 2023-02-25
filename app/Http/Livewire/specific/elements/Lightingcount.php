<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Lightingcount extends MainDropdownComponent
{
    //--> Custom
    public string $element = "lighting";
    public string $title = "Verlichting";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
