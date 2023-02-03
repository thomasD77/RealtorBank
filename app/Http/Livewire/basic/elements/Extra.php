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
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function render()
    {
        $area = $this->basicArea;
        $area->extra = $this->extra;
        $area->update();

        return view('livewire.elements.extra');
    }
}
