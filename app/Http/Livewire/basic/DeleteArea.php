<?php

namespace App\Http\Livewire\Basic;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DeleteArea extends Component
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

    public function deleteArea(){
        if($this->basicArea->sidebar_count != 1){
            $this->basicArea->delete();
            return redirect()->route('inspection.edit', ['inspection' => $this->inspection]);
        }
    }

    public function render()
    {
        return view('livewire.basic.delete-area');
    }
}
