<?php

namespace App\Http\Livewire\General;

use App\Models\Inspection;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class RenameRoom extends Component
{
    public Inspection $inspection;
    public Room $room;

    public $title;

    public function mount(Inspection $inspection, Room $room)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->title = $this->room->title;
    }

    public function submitTitle(){
        $this->room->title = $this->title;
        $this->room->update();

        Session::flash('successRename', 'succes!');
        $this->emit('renderNewArea');
    }

    public function render()
    {
        return view('livewire.general.rename-room');
    }
}
