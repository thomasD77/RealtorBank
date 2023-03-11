<?php

namespace App\Http\Livewire\Meters;

use App\Models\Inspection;
use App\Models\Meter;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Inspection $inspection;
    public Meter $meter;

    public $EAN;
    public $reference;
    public $date;

    public function mount(Inspection $inspection, Meter $meter)
    {
        $this->inspection = $inspection;
        $this->meter = $meter;
        $this->EAN = $this->meter->EAN;
        $this->date = $this->meter->date;
        $this->reference = $this->meter->reference;
    }

    public function meterSubmit()
    {
        $this->meter->EAN = $this->EAN;
        $this->meter->reference = $this->reference;
        $this->meter->date = $this->date;
        $this->meter->update();
        session()->flash('success', 'success!');
    }

    public function render()
    {
        return view('livewire.meters.edit');
    }
}
