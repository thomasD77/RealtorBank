<?php

namespace App\Http\Livewire\Basic;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class GenerateFavourite extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Area $area;
    public BasicArea $basicArea;
    public $isFavourite;

    protected $listeners = ['renderFavourite' => 'render'];

    public function mount(Inspection $inspection, Room $room, Area $area, BasicArea $basicArea)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->area = $area;
        $this->basicArea = $basicArea;
        $this->isFavourite = $this->basicArea->isFavourite;
    }

    public function generateFavourite()
    {
        $favourite = BasicArea::query()
            ->where('inspection_id', $this->inspection->id)
            ->where('isFavourite', $this->basicArea->area->code)
            ->first();

        $this->basicArea->material = $favourite->material;
        $this->basicArea->color = $favourite->color;
        $this->basicArea->plinth = $favourite->plinth;
        $this->basicArea->analysis = $favourite->analysis;
        $this->basicArea->type = $favourite->type;
        $this->basicArea->handle = $favourite->handle;
        $this->basicArea->lists = $favourite->lists;
        $this->basicArea->key = $favourite->key;
        $this->basicArea->doorPump = $favourite->doorPump;
        $this->basicArea->doorStop = $favourite->doorStop;
        $this->basicArea->plaster = $favourite->plaster;
        $this->basicArea->finish = $favourite->finish;
        $this->basicArea->ventilationGrille = $favourite->ventilationGrille;
        $this->basicArea->glazing = $favourite->glazing;
        $this->basicArea->windowsill = $favourite->windowsill;
        $this->basicArea->rollerShutter = $favourite->rollerShutter;
        $this->basicArea->windowDecoration = $favourite->windowDecoration;
        $this->basicArea->windowDecoration = $favourite->windowDecoration;
        $this->basicArea->hor = $favourite->hor;
        $this->basicArea->fallProtection = $favourite->fallProtection;
        $this->basicArea->energy = $favourite->energy;
        $this->basicArea->extra = $favourite->extra;

        $this->basicArea->updated_at = now();
        $this->basicArea->save();

        $this->dispatchBrowserEvent('refresh-page');
        Session::flash('successGen', 'succes!');
    }

    public function render()
    {
        return view('livewire.basic.generate-favourite');
    }
}
