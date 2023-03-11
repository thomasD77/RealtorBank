<?php

namespace App\Http\Livewire\Outdoor;

use App\Models\Inspection;
use App\Models\Outdoor;
use App\Models\OutdoorArea;
use App\Models\Room;
use Livewire\Component;

class OutdoorAreaForm extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Outdoor $outdoor;
    public OutdoorArea $outdoorArea;

    public $status;

    public function mount(Inspection $inspection, Outdoor $outdoor, OutdoorArea $outdoorArea)
    {
        $this->inspection = $inspection;
        $this->outdoor = $outdoor;
        $this->outdoorArea = $outdoorArea;
    }
    public function render()
    {
        return view('livewire.outdoor.outdoor-area-form');
    }
}
