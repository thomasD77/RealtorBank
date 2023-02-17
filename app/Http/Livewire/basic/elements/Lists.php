<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Lists extends MainDropdownComponent
{
    //--> Custom
    public string $element = "lists";
    public string $title = "Lijsten";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getLists();
    }
}
