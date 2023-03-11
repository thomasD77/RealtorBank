<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;

class Count extends MainDropdownComponent
{
    //--> Custom
    public string $element = "count";
    public string $title = "Aantal";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
