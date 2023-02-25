<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Mirror extends MainDropdownComponent
{
    //--> Custom
    public string $element = "analysis";
    public string $title = "Analyse";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getAnalysis();
    }
}
