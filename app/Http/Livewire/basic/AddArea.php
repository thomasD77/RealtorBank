<?php

namespace App\Http\Livewire\Basic;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class AddArea extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Area $area;
    public BasicArea $basicArea;
    public $status;

    public function mount(Inspection $inspection, Room $room, Area $area)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->area = $area;
        $this->basicArea = BasicArea::query()
            ->where('room_id', $room->id)
            ->where('area_id', $area->id)
            ->first();
    }

    public function addArea(){
        $extraArea = new BasicArea();
        $extraArea->room_id = $this->room->id;
        $extraArea->area->id = $this->area->id;

    }

    public function render()
    {
        return view('livewire.basic.add-area');
    }
}
