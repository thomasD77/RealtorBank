<?php

namespace App\Http\Livewire\Conform;

use App\Models\Area;
use App\Models\Conform;
use App\Models\ConformArea;
use App\Models\Inspection;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddArea extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Conform $conform;
    public ConformArea $conformArea;
    public $status;


    public function mount(Inspection $inspection, Room $room, Conform $conform, ConformArea $conformArea)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->conform = $conform;
        $this->conformArea = $conformArea;
    }

    public function addArea(){
        $newConform = new Conform();
        $newConform->title = $this->conform->title;
        $newConform->code = $this->conform->code;
        //$newConform->order = $this->conform->order;
        $newConform->created_at = now();
        $newConform->updated_at = now();
        $newConform->save();

        //First select all the areas for this BasicArea
        $conformAreas = ConformArea::where('floor_id', $this->conformArea->floor_id)
            ->where('room_id', $this->conformArea->room_id)
            ->pluck('conform_id')
            ->toArray();

        //Count how much areas we have for this Inspection -> floor -> room
        $lightingCount = Conform::query()
            ->whereIn('id', $conformAreas)
            ->where('code', 'lighting')
            ->count();

        $extraArea = new ConformArea();
        $extraArea->room_id = $this->room->id;
        $extraArea->conform_id = $newConform->id;
        $extraArea->inspection_id = $this->inspection->id;
        $extraArea->floor_id = $this->room->floor->id;
        $extraArea->sidebar_count = $lightingCount + 1;

        $extraArea->material = $this->conformArea->material;
        $extraArea->color = $this->conformArea->color;
        $extraArea->present = $this->conformArea->present;
        $extraArea->single = $this->conformArea->single;
        $extraArea->multiple = $this->conformArea->multiple;
        $extraArea->brand = $this->conformArea->brand;
        $extraArea->electronics = $this->conformArea->electronics;
        $extraArea->phone = $this->conformArea->phone;
        $extraArea->internet = $this->conformArea->internet;
        $extraArea->audio = $this->conformArea->audio;
        $extraArea->type = $this->conformArea->type;
        $extraArea->count = $this->conformArea->count;
        $extraArea->analysis = $this->conformArea->analysis;
        $extraArea->extra = $this->conformArea->extra;

        $extraArea->created_at = now();
        $extraArea->updated_at = now();

        $extraArea->save();
        Session::flash('successAdd', 'succes!');
        $this->emit('renderNewArea');
    }
    public function render()
    {
        return view('livewire.conform.add-area');
    }
}
