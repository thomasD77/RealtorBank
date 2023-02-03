<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Models\Conform;
use App\Models\ConformArea;
use Livewire\Component;

class Extra extends Component
{
    public ConformArea $conformArea;
    public $status = "";
    public $extra;

    public function mount(ConformArea $conformArea)
    {
        $this->conformArea = $conformArea;
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function render()
    {
        $conform = $this->conformArea;
        $conform->extra = $this->extra;
        $conform->update();

        return view('livewire.elements.extra');
    }
}
