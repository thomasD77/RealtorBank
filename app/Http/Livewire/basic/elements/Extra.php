<?php

namespace App\Http\Livewire\Basic\Elements;


use App\Models\BasicArea;
use Livewire\Component;

class Extra extends Component
{
    public BasicArea $basicArea;
    public $status = "";
    public $extra;

    public function mount(BasicArea $basicArea)
    {
        $this->basicArea = $basicArea;
        $this->extra = $basicArea->extra;
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function submit()
    {
        $area = $this->basicArea;
        $area->extra = $this->extra;
        $area->update();
    }

    public function render()
    {
        return view('livewire.elements.extra');
    }
}
