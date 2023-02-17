<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use App\Models\Data;
use Livewire\Component;

class Ventilationgrille extends MainDropdownComponent
{
    //--> Custom
    public string $element = "ventilationGrille";
    public string $title = "Ventilatie rooster";

    public function mount($dynamicArea )
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
