<?php

namespace App\Http\Livewire\General\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cleanliness extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cleanliness";
    public string $title = "Netheid";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getStatus();
    }
}
