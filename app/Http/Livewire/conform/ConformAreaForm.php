<?php

namespace App\Http\Livewire\Conform;

use App\Models\Area;
use App\Models\ConformArea;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class ConformAreaForm extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Area $area;
    public $status;

    public function mount(Inspection $inspection, Room $room, Area $area, ConformArea $conformArea)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->area = $area;
        $this->conform = $conformArea;
    }

    public function render()
    {
        return view('livewire.basic.conform-areas-area-form-' . $this->area->code, [
            'area' => $this->area
        ]);
    }
}
