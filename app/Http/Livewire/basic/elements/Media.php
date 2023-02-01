<?php

namespace App\Http\Livewire\Basic;

use App\Models\BasicArea;
use Livewire\Component;

class Media extends Component
{
    public BasicArea $basicArea;
    public $statusMedia = "";

    public function mount(BasicArea $basicArea)
    {
        $this->basicArea = $basicArea;
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
