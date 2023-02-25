<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Manual extends MainDropdownComponent
{
    //--> Custom
    public string $element = "manual";
    public string $title = "Handleiding";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
