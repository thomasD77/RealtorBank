<?php

namespace App\Http\Livewire\Basic;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class MakeFavourite extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Area $area;
    public BasicArea $basicArea;
    public $isFavourite;

    public function mount(Inspection $inspection, Room $room, Area $area, BasicArea $basicArea)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->area = $area;
        $this->basicArea = $basicArea;
        $this->isFavourite = $this->basicArea->isFavourite;
    }

    public function makeFavourite()
    {
        //First reset the existing favourite
        $old_favourite = BasicArea::query()
            ->where('inspection_id', $this->inspection->id)
            ->where('isFavourite', $this->basicArea->area->code)
            ->first();

        if($old_favourite){
            if($old_favourite->id == $this->basicArea->id){
                if($this->basicArea->isFavourite){
                    $this->basicArea->isFavourite = null;
                }else {
                    $this->basicArea->isFavourite = $this->basicArea->area->code;
                }
            }else {
                $old_favourite->isFavourite = null;
                $old_favourite->update();
                $this->basicArea->isFavourite = $this->area->code;
            }
        }else {
            $this->basicArea->isFavourite = $this->basicArea->area->code;
        }

        $this->basicArea->update();
        $this->isFavourite = $this->basicArea->isFavourite;
    }

    public function render()
    {
        return view('livewire.basic.make-favourite');
    }
}
