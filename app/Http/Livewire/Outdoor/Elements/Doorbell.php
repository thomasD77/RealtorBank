<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Doorbell extends MainDropdownComponent
{
    //--> Custom
    public string $element = "doorBel";
    public string $title = "Deurbel";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getButtons();
    }
}
