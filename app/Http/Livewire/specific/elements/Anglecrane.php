<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Anglecrane extends MainDropdownComponent
{
    //--> Custom
    public string $element = "angleCrane";
    public string $title = "Hoekkraan";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
