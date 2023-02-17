<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MainExtraComponent extends Component
{
    public $dynamicArea;
    public $status = "";
    public $extra;

    public function mount($dynamicArea)
    {
        $this->dynamicArea = $dynamicArea;
        $this->extra = $dynamicArea->extra;
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function submit()
    {
        $area = $this->dynamicArea;
        $area->extra = $this->extra;
        $area->update();
    }

    public function render()
    {
        return view('livewire.elements.extra');
    }
}
