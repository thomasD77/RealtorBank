<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cabhigh extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabHigh";
    public string $title = "Hoge kasten";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
