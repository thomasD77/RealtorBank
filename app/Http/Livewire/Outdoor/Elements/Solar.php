<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;

class Solar extends MainDropdownComponent
{
    //--> Custom
    public string $element = "solar";
    public string $title = "Zonnepanelen";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
