<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;

class Hedges extends MainDropdownComponent
{
    //--> Custom
    public string $element = "hedges";
    public string $title = "Hagen";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
