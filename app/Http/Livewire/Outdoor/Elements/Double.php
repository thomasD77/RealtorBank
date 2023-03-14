<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\OutdoorArea;

class Double extends MainDropdownComponent
{
    //--> Custom
    public string $element = "double";
    public string $title = "Meervoudig";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}