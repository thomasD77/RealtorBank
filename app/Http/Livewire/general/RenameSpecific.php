<?php

namespace App\Http\Livewire\General;

use App\Models\Inspection;
use App\Models\Room;
use App\Models\Specific;
use App\Models\SpecificArea;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class RenameSpecific extends Component
{
    public Inspection $inspection;
    public Specific $specific;
    public SpecificArea $specificArea;

    public $title;

    public function mount(Inspection $inspection, Specific $specific)
    {
        $this->inspection = $inspection;
        $this->specific = $specific;
        $this->title = $this->specific->title;

        $this->specificArea = SpecificArea::where('inspection_id', $this->inspection->id)
            ->where('specific_id', $this->specific->id)
            ->first();
    }

    public function submitTitle(){
        // Make new specific for this personelised name
        $newSpecific = new Specific();
        $newSpecific->title = $this->title;
        $newSpecific->code = $this->specific->code;
        $newSpecific->room_key = $this->specific->room_key;
        $newSpecific->save();

        // Connect new specific
        $this->specificArea->specific_id = $newSpecific->id;
        $this->specificArea->update();

        $this->specificArea = SpecificArea::where('inspection_id', $this->inspection->id)
            ->where('specific_id', $newSpecific->id)
            ->first();

        $this->specific = $newSpecific;

        Session::flash('successRename', 'succes!');
        //$this->emit('renderNewArea');
        return redirect()->route('area.specific', ['inspection' => $this->inspection, 'room' => $this->specificArea->room ,'specific' => $newSpecific->id]);
    }


    public function render()
    {
        return view('livewire.general.rename-specific');
    }
}
