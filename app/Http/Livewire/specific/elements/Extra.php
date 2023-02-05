<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Models\SpecificArea;
use Livewire\Component;

class Extra extends Component
{
    public $status = "";
    public $extra;
    public SpecificArea $specificArea;

    public function mount(SpecificArea $specificArea)
    {
        $this->specificArea = $specificArea;
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function render()
    {
        $specific = $this->specificArea;
        $specific->extra = $this->extra;
        $specific->update();

        return view('livewire.elements.extra');
    }
}
