<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Models\BasicArea;
use Livewire\Component;

class Hor extends Component
{
    //--> Custom
    public string $element = "hor";
    public string $title = "Hor";

    public function mount($dynamicArea )
    {
        //--> Custom
        $this->parameters = BasicArea::getHors();
    }
}
