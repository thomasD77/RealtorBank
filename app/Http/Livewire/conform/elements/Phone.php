<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Phone extends MainDropdownComponent
{
    //--> Custom
    public string $element = "phone";
    public string $title = "Telefoon";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
        $this->dynamicArea = $dynamicArea;
    }
}
