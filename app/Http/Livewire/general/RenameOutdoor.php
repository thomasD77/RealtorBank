<?php

namespace App\Http\Livewire\General;

use App\Models\Inspection;
use App\Models\Outdoor;
use App\Models\OutdoorArea;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class RenameOutdoor extends Component
{
    public Inspection $inspection;
    public OutdoorArea $outdoorArea;
    public Outdoor $outdoor;

    public $title;

    public function mount(Inspection $inspection, Outdoor $outdoor)
    {
        $this->inspection = $inspection;
        $this->outdoor = $outdoor;
        $this->title = $outdoor->title;

        $this->outdoorArea = OutdoorArea::where('inspection_id', $this->inspection->id)
            ->where('outdoor_id', $this->outdoor->id)
            ->first();
    }

    public function submitTitle(){
        //
        $this->outdoor->title = $this->title;
        $this->outdoor->update();

        Session::flash('successRename', 'succes!');
        $this->emit('renderNewArea');
    }

    public function render()
    {
        return view('livewire.general.rename-outdoor');
    }
}
