<?php

namespace App\Http\Livewire\Specific;
use App\Models\Inspection;
use App\Models\Room;
use App\Models\Specific;
use App\Models\SpecificArea;
use Livewire\Component;

class SpecificAreaForm extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Specific $specific;
    public SpecificArea $specificArea;

    public $status;

    public function mount(Inspection $inspection, Room $room, Specific $specific, SpecificArea $specificArea)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->specific = $specific;
        $this->specificArea = $specificArea;
    }

    public function render()
    {
        return view('livewire.specific.specific-area-form');
    }
}
