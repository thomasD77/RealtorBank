<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\OutdoorArea;

class Single extends MainDropdownComponent
{
    //--> Custom
    public string $element = "single";
    public string $title = "Enkelvoudig";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
