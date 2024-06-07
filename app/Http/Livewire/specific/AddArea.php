<?php

namespace App\Http\Livewire\Specific;

use App\Models\Inspection;
use App\Models\Room;
use App\Models\Specific;
use App\Models\SpecificArea;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddArea extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Specific $specific;
    public SpecificArea $specificArea;
    public $status;

    public function mount(Inspection $inspection, Room $room, Specific $specific, SpecificArea $specificArea)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->specific = $specific;
        $this->specificArea = $specificArea;
    }

    public function addArea()
    {
        $newArea = new Specific();
        $newArea->title = $this->specific->title;
        $newArea->code = $this->specific->code;
        $newArea->created_at = now();
        $newArea->updated_at = now();
        $newArea->save();

        $extraArea = new SpecificArea();
        $extraArea->room_id = $this->room->id;
        $extraArea->specific_id = $newArea->id;
        $extraArea->inspection_id = $this->inspection->id;
        $extraArea->floor_id = $this->room->floor->id;

        $extraArea->handrail = $this->specificArea->handrail;
        $extraArea->material = $this->specificArea->material;
        $extraArea->shelves = $this->specificArea->shelves;
        $extraArea->color = $this->specificArea->color;
        $extraArea->present = $this->specificArea->present;
        $extraArea->dorpel = $this->specificArea->dorpel;
        $extraArea->glassInlay = $this->specificArea->glassInlay;
        $extraArea->handle = $this->specificArea->handle;
        $extraArea->mailbox = $this->specificArea->mailbox;
        $extraArea->peephole = $this->specificArea->peephole;
        $extraArea->window = $this->specificArea->window;
        $extraArea->doorBel = $this->specificArea->doorBel;
        $extraArea->brand = $this->specificArea->brand;
        $extraArea->type = $this->specificArea->type;
        $extraArea->model = $this->specificArea->model;
        $extraArea->doors = $this->specificArea->doors;
        $extraArea->drawers = $this->specificArea->drawers;
        $extraArea->rod = $this->specificArea->rod;
        $extraArea->trap = $this->specificArea->trap;
        $extraArea->mirror = $this->specificArea->mirror;
        $extraArea->toiletPaperHolder = $this->specificArea->toiletPaperHolder;
        $extraArea->cupboard = $this->specificArea->cupboard;
        $extraArea->stop = $this->specificArea->stop;
        $extraArea->crane = $this->specificArea->crane;
        $extraArea->siphon = $this->specificArea->siphon;
        $extraArea->angleCrane = $this->specificArea->angleCrane;
        $extraArea->rinse = $this->specificArea->rinse;
        $extraArea->seat = $this->specificArea->seat;
        $extraArea->energy = $this->specificArea->energy;
        $extraArea->cabLow = $this->specificArea->cabLow;
        $extraArea->cabLowDoors = $this->specificArea->cabLowDoors;
        $extraArea->cabLowDrawers = $this->specificArea->cabLowDrawers;
        $extraArea->cabLowShelves = $this->specificArea->cabLowShelves;
        $extraArea->cabHigh = $this->specificArea->cabHigh;
        $extraArea->cabHighDoors = $this->specificArea->cabHighDoors;
        $extraArea->cabHighShelves = $this->specificArea->s;
        $extraArea->cabinet = $this->specificArea->cabinet;
        $extraArea->cabinetDoors = $this->specificArea->cabinetDoors;
        $extraArea->cabinetDrawers = $this->specificArea->cabinetDrawers;
        $extraArea->cabinetShelves = $this->specificArea->cabinetShelves;
        $extraArea->cutleryDrawer = $this->specificArea->cutleryDrawer;
        $extraArea->kitchenHandle = $this->specificArea->kitchenHandle;
        $extraArea->filter = $this->specificArea->filter;
        $extraArea->lighting = $this->specificArea->lighting;
        $extraArea->manual = $this->specificArea->manual;
        $extraArea->zones = $this->specificArea->zones;
        $extraArea->bakingTray = $this->specificArea->bakingTray;
        $extraArea->rooster = $this->specificArea->rooster;
        $extraArea->shelf = $this->specificArea->shelf;
        $extraArea->vegetableTray = $this->specificArea->vegetableTray;
        $extraArea->doorBins = $this->specificArea->doorBins;
        $extraArea->cutleryBasket = $this->specificArea->cutleryBasket;
        $extraArea->floor = $this->specificArea->floor;
        $extraArea->walls = $this->specificArea->walls;
        $extraArea->shower = $this->specificArea->shower;
        $extraArea->protection = $this->specificArea->protection;
        $extraArea->casing = $this->specificArea->casing;
        $extraArea->position = $this->specificArea->position;
        $extraArea->vaporBarrier = $this->specificArea->vaporBarrier;
        $extraArea->service = $this->specificArea->service;
        $extraArea->analysis = $this->specificArea->analysis;
        $extraArea->extra = $this->specificArea->extra;

        $extraArea->created_at = now();
        $extraArea->updated_at = now();

        $extraArea->save();
        Session::flash('successAdd', 'succes!');
        $this->emit('renderNewArea');
    }
    public function render()
    {
        return view('livewire.specific.add-area');
    }
}
