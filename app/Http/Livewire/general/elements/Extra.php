<?php

namespace App\Http\Livewire\General\Elements;

use App\Models\Data;
use App\Models\General;
use Livewire\Component;

class Extra extends Component
{
    public General $general;
    public string $status = "";
    public $extra;

    //--> Custom
    public string $element = "extra";
    public string $title = "Extra";

    public function mount(General $general)
    {
        $this->general = $general;
        $this->extra = $general->extra;
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function submit()
    {
        $general = $this->general;
        $general->extra = $this->extra;
        $general->update();
        session()->flash('success', 'success!');
    }

    public function render()
    {
        return view('livewire.elements.extra');
    }
}
