<?php

namespace App\Http\Livewire\Keys\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Key;
use Livewire\Component;

class Types extends MainDropdownComponent
{
    //--> Custom
    public string $element = "type";
    public string $title = "Type";

    public function mount($dynamicArea )
    {
        //--> Custom
        $this->parameters = Key::getTypes();
    }
}
