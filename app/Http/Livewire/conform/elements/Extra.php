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
        $this->extra = $conformArea->extra;
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function submit()
    {
        $conform = $this->conformArea;
        $conform->extra = $this->extra;
        $conform->update();
        session()->flash('success', 'success!');
    }

    public function render()
    {
        return view('livewire.elements.extra');
    }
}
