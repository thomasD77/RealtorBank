<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Http\Livewire\MainExtraComponent;

class Extra extends MainExtraComponent
{
    public function mount($dynamicArea)
    {
        $this->dynamicArea = $dynamicArea;
        $this->extra = $dynamicArea->extra;
    }
}
