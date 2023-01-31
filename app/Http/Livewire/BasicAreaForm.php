<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class BasicAreaForm extends Component
{
    public Area $area;
    public Room $room;
    public BasicArea $basicArea;

    public function mount(Area $area, Room $room)
    {
        $this->area = $area;
        $this->room = $room;
        $this->basicArea = BasicArea::where('room_id', $room->id)->first();
    }

    public function render()
    {
        $materials = [
            'keramische tegel',
            'tegel',
            'parket',
            'laminaat',
            'beton',
            'OSB',
            'epoxy',
            'plancher',
            'tapijt',
            'linoleum',
            'vinyl',
            'ander',
        ];

        return view('livewire.basic-area-form', [
            'materials' => $materials,
            'area' => $this->area
        ]);
    }

    public function select($title)
    {
        $area = $this->basicArea;
        $area->material = $title;
        $area->update();
    }
}
