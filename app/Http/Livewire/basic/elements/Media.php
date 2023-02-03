<?php

namespace App\Http\Livewire\Basic\Elements;


use App\Models\BasicArea;
use Livewire\Component;

class Media extends Component
{
    public BasicArea $basicArea;
    public $status = "";

    public function mount(BasicArea $basicArea)
    {
        $this->basicArea = $basicArea;
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
