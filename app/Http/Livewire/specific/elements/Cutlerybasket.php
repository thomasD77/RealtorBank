<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cutlerybasket extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cutleryBasket";
    public string $title = "Bestekmandje";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
