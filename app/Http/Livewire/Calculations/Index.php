<?php

namespace App\Http\Livewire\Calculations;

use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Floor $floor;

    public function mount(Inspection $inspection, Room $room, Floor $floor)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->floor = $floor;
    }

    public function render()
    {
        return view('livewire.calculations.index');
    }
}
