<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\OutdoorArea;

class Chimney extends MainDropdownComponent
{
    //--> Custom
    public string $element = "chimney";
    public string $title = "Schoorsteen";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = OutdoorArea::getMaterials();
    }
}
