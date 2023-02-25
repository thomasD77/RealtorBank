<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cabhighdrawers extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cabHighDrawers";
    public string $title = "Hoge kasten - lades";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
