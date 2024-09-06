<?php

namespace App\Http\Livewire\Outdoor;

use App\Models\Inspection;
use App\Models\Outdoor;
use App\Models\OutdoorArea;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddOutdoor extends Component
{
    public Inspection $inspection;
    public Outdoor $outdoor;
    public OutdoorArea $outdoorArea;

    public function mount(Inspection $inspection, OutdoorArea $outdoorArea, Outdoor $outdoor)
    {
        $this->inspection = $inspection;
        $this->outdoor = $outdoor;
        $this->outdoorArea = $outdoorArea;

    }

    public function addOutdoor()
    {
        //new Outdoor
        $newOutdoor = new Outdoor();
        $newOutdoor->title = $this->outdoor->title;
        $newOutdoor->code = $this->outdoor->code;
        $newOutdoor->created_at = now();
        $newOutdoor->updated_at = now();
        $newOutdoor->save();

        //new OutdoorArea
        $extraOutdoorArea = new OutdoorArea();
        $extraOutdoorArea->inspection_id = $this->inspection->id;
        $extraOutdoorArea->room_id = $this->outdoorArea->room_id;
        $extraOutdoorArea->outdoor_id = $newOutdoor->id;

        $extraOutdoorArea->material = $this->outdoorArea->material;
        $extraOutdoorArea->finish = $this->outdoorArea->finish;
        $extraOutdoorArea->color = $this->outdoorArea->color;
        $extraOutdoorArea->windowsill = $this->outdoorArea->windowsill;
        $extraOutdoorArea->type = $this->outdoorArea->type;
        $extraOutdoorArea->footh = $this->outdoorArea->footh;
        $extraOutdoorArea->cover = $this->outdoorArea->cover;
        $extraOutdoorArea->chimney = $this->outdoorArea->chimney;
        $extraOutdoorArea->solar = $this->outdoorArea->solar;
        $extraOutdoorArea->lock = $this->outdoorArea->lock;
        $extraOutdoorArea->handrail = $this->outdoorArea->handrail;
        $extraOutdoorArea->balustrade = $this->outdoorArea->balustrade;
        $extraOutdoorArea->parts = $this->outdoorArea->parts;
        $extraOutdoorArea->count = $this->outdoorArea->count;
        $extraOutdoorArea->movementDetector = $this->outdoorArea->movementDetector;
        $extraOutdoorArea->gras = $this->outdoorArea->gras;
        $extraOutdoorArea->hedges = $this->outdoorArea->hedges;
        $extraOutdoorArea->trees = $this->outdoorArea->trees;
        $extraOutdoorArea->single = $this->outdoorArea->single;
        $extraOutdoorArea->double = $this->outdoorArea->double;
        $extraOutdoorArea->brand = $this->outdoorArea->brand;
        $extraOutdoorArea->crane = $this->outdoorArea->crane;
        $extraOutdoorArea->glassInlay = $this->outdoorArea->glassInlay;
        $extraOutdoorArea->handle = $this->outdoorArea->handle;
        $extraOutdoorArea->mailbox = $this->outdoorArea->mailbox;
        $extraOutdoorArea->peephole = $this->outdoorArea->peephole;
        $extraOutdoorArea->window = $this->outdoorArea->window;
        $extraOutdoorArea->doorBel = $this->outdoorArea->doorBel;
        $extraOutdoorArea->dorpel = $this->outdoorArea->dorpel;
        $extraOutdoorArea->analysis = $this->outdoorArea->analysis;
        $extraOutdoorArea->extra = $this->outdoorArea->extra;
        $extraOutdoorArea->created_at = now();
        $extraOutdoorArea->updated_at = now();

        $extraOutdoorArea->save();
        Session::flash('successAdd', 'succes!');
        $this->emit('renderNewArea');
    }

    public function render()
    {
        return view('livewire.outdoor.add-outdoor');
    }
}
