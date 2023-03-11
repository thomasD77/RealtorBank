<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Finish extends MainDropdownComponent
{
    //--> Custom
    public string $element = "finish";
    public string $title = "Afwerking";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getFinishes();
    }
}
