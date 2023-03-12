<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Glassinlay extends MainDropdownComponent
{
    //--> Custom
    public string $element = "glassInlay";
    public string $title = "Glasinleg";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
