<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Models\BasicArea;
use App\Models\Data;
use Livewire\Component;

class Key extends Component
{
    //--> Custom
    public string $element = "key";
    public string $title = "Sleutels";

    public function mount(BasicArea $basicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
    }
}
