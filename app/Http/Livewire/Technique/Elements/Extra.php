<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Http\Livewire\MainExtraComponent;
use Livewire\Component;

class Extra extends MainExtraComponent
{
    public function mount($dynamicArea)
    {
        $this->dynamicArea = $dynamicArea;
        $this->extra = $dynamicArea->extra;
    }
}
