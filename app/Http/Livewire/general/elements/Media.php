<?php

namespace App\Http\Livewire\General\Elements;

use App\Models\General;
use Livewire\Component;

class Media extends Component
{
    public General $general;
    public $status = "";

    public function mount(General $general)
    {
        $this->general = $general;
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
