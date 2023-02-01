<?php

namespace App\Http\Livewire\Basic;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class BasicAreaForm extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Area $area;
    public BasicArea $basicArea;

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

    public function render()
    {
        return view('livewire.basic.basic-area-form-' . $this->area->code, [
            'area' => $this->area
        ]);
    }
}
