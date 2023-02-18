<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Single extends MainDropdownComponent
{
    //--> Custom
    public string $element = "single";
    public string $title = "Enkelvoudig";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
        $this->dynamicArea = $dynamicArea;
    }
}
