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

    public function mount(Inspection $inspection, Room $room, Area $area, BasicArea $basicArea)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->area = $area;
        $this->basicArea = $basicArea;
    }

    public function addArea(){
        $extraArea = new BasicArea();
        $extraArea->room_id = $this->room->id;
        $extraArea->area_id = $this->area->id;
        $extraArea->code = 'BASIC';

        $extraArea->created_at = now();
        $extraArea->updated_at = now();

        $extraArea->save();
    }

    public function render()
    {
        return view('livewire.basic.add-area');
    }
}
