<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Cutlerydrawer extends MainDropdownComponent
{
    //--> Custom
    public string $element = "cutleryDrawer";
    public string $title = "Besteklade";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
    }
}
