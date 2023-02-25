<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Bakingtray extends MainDropdownComponent
{
    //--> Custom
    public string $element = "bakingTray";
    public string $title = "Bakplaat";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
