<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Fallprotection extends MainDropdownComponent
{
    //--> Custom
    public string $element = "fallProtection";
    public string $title = "Valbeveiliging";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getFallProtections();
    }
}
