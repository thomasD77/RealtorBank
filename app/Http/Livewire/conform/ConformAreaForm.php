<?php

namespace App\Http\Livewire\Conform;

use App\Models\Area;
use App\Models\Conform;
use App\Models\ConformArea;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class ConformAreaForm extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Conform $conform;
    public ConformArea $conformArea;

    public $status;

    public function mount(Inspection $inspection, Room $room, Area $area, Conform $conform, ConformArea $conformArea)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->area = $area;
        $this->conform = $conform;
        $this->conformAree = $conformArea;
    }

    public function render()
    {
        return view('livewire.conform.conform-area-form');
    }
}
