<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;

class Analysis extends MainDropdownComponent
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