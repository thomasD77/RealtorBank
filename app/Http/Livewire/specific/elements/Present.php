<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Present extends MainDropdownComponent
{
    //--> Custom
    public string $element = "present";
    public string $title = "Aanwezig";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
        $this->dynamicArea = $dynamicArea;
    }
}
