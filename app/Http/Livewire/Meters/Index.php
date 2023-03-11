<?php

namespace App\Http\Livewire\Meters;

use App\Models\Inspection;
use App\Models\Meter;
use Livewire\Component;

class Index extends Component
{
    public Inspection $inspection;
    public $meters;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->meters = Meter::where('inspection_id', $this->inspection->id)->get();
    }

    public function render()
    {
        return view('livewire.meters.index');
    }
}
