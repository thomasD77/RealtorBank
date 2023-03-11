<?php

namespace App\Http\Livewire\Keys\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Count extends MainDropdownComponent
{
    //--> Custom
    public string $element = "count";
    public string $title = "Aantal";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
        $this->dynamicArea = $dynamicArea;
    }
}
