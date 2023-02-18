<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Electronics extends MainDropdownComponent
{
    //--> Custom
    public string $element = "electronics";
    public string $title = "TV/radio";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
        $this->dynamicArea = $dynamicArea;
    }
}
