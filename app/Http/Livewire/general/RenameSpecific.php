<?php

namespace App\Http\Livewire\General;

use App\Models\Inspection;
use App\Models\Room;
use App\Models\Specific;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class RenameSpecific extends Component
{
    public Inspection $inspection;
    public Specific $specific;

    public $title;

    public function mount(Inspection $inspection, Specific $specific)
    {
        $this->inspection = $inspection;
        $this->specific = $specific;
        $this->title = $this->specific->title;
    }

    public function submitTitle(){
        $this->specific->title = $this->title;
        $this->specific->update();

        Session::flash('successRename', 'succes!');
        $this->emit('renderNewArea');
    }


    public function render()
    {
        return view('livewire.general.rename-specific');
    }
}
