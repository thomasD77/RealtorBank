<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cabhighdoors extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabHighDoors";
    public string $title = "Hoge kasten - deuren";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
