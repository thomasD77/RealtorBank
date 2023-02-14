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
        $this->extra = $specificArea->extra;
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function submit()
    {
        $specific = $this->specificArea;
        $specific->extra = $this->extra;
        $specific->update();
    }

    public function render()
    {
        return view('livewire.elements.extra');
    }
}
