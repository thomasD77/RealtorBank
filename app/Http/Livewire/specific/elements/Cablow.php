<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cablow extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabLow";
    public string $title = "Lage kasten";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
