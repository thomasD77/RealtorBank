<?php

namespace App\Http\Livewire\General;

use App\Models\Inspection;
use App\Models\General;
use App\Models\Room;
use Livewire\Component;

class GeneralAreaForm extends Component
{
    public Inspection $inspection;
    public Room $room;
    public General $general;

    public function mount(Inspection $inspection, Room $room)
    {
        $this->inspection = $inspection;
        $this->room = $room;

        $general = General::query()
            ->where('inspection_id', $inspection->id)
            ->where('room_id', $room->id)
            ->first();

        $this->general = $general;
    }

    public function render()
    {
        return view('livewire.general.general-area-form');
    }
}
