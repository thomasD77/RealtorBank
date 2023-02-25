<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Vegetabletray extends MainDropdownComponent
{
    //--> Custom
    public string $element = "vegetableTray";
    public string $title = "Groentenbak";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
