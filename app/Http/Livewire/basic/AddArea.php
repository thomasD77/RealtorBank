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
        $newArea = new Area();
        $newArea->title = $this->area->title;
        $newArea->code = $this->area->code;
        $newArea->created_at = now();
        $newArea->updated_at = now();
        $newArea->save();

        $extraArea = new BasicArea();
        $extraArea->room_id = $this->room->id;
        $extraArea->area_id = $newArea->id;
        $extraArea->code = 'BASIC';

        $extraArea->created_at = now();
        $extraArea->updated_at = now();

        $extraArea->save();
        $this->emit('renderNewArea');
    }

    public function render()
    {
        return view('livewire.basic.add-area');
    }
}
