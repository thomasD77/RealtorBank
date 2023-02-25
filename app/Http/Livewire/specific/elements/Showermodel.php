<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\SpecificArea;
use Livewire\Component;

class Showermodel extends MainDropdownComponent
{
    //--> Custom
    public string $element = "shower";
    public string $title = "Model";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getShowerModel();
    }
}
