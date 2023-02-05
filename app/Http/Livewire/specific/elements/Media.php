<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Models\SpecificArea;
use Livewire\Component;

class Media extends Component
{
    public SpecificArea $specificArea;
    public $status = "";

    public function mount(SpecificArea $specificArea)
    {
        $this->specificArea = $specificArea;
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
