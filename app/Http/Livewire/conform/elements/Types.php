<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\ConformArea;
use Livewire\Component;

class Types extends MainDropdownComponent
{
    //--> Custom
    public string $element = "type";
    public string $title = "Type";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = ConformArea::getTypes();
    }
}
