<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Finish extends MainDropdownComponent
{
    //--> Custom
    public string $element = "finish";
    public string $title = "Afwerking";

    public function mount($dynamicArea )
    {
        //--> Custom
        $this->parameters = BasicArea::getFinishes();
    }
}
