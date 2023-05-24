<?php

namespace App\Http\Livewire\General;

use App\Enums\FloorKey;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class GroundFloorSorting extends Component
{
    public Inspection $inspection;

    public $groundFloorParam;

    public $maxGround;
    public $minGround;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
    }

    public function itemUp($room)
    {
        Room::itemUp($room);

        //Render
        $this->emit('renderNewArea');
    }

    public function itemDown($room)
    {
        Room::itemDown($room);

        //Render
        $this->emit('renderNewArea');
    }

    public function render()
    {
        $this->groundFloorParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
            ->whereNotNull('order')
            ->orderBy('order', 'asc')
            ->get();

        $this->maxGround = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
            ->whereNotNull('order')
            ->max('order');

        $this->minGround = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
        ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
            ->whereNotNull('order')
            ->min('order');

        return view('livewire.general.ground-floor-sorting');
    }
}
