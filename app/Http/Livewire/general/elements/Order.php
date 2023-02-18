<?php

namespace App\Http\Livewire\General\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use Livewire\Component;

class Order extends MainDropdownComponent
{
    //--> Custom
    public string $element = "order";
    public string $title = "Orde";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = Data::getStatus();
    }
}
