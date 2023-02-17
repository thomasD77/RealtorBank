<?php

namespace App\Http\Livewire\General\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Painting extends MainDropdownComponent
{
    //--> Custom
    public string $element = "painting";
    public string $title = "Schilderwerken";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getStatus();
    }
}
