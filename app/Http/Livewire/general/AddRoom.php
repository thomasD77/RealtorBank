<?php

namespace App\Http\Livewire\General;

use Livewire\Component;
use App\Models\Inspection;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use App\Models\BasicArea;
use App\Models\SpecificArea;
use App\Models\ConformArea;
use App\Models\General;

class AddRoom extends Component
{
    public Inspection $inspection;
    public Room $room;
    public BasicArea $basicArea;

    public function mount(Inspection $inspection, Room $room)
    {
        $this->inspection = $inspection;
        $this->room = $room;
    }


    public function addRoom()
    {
        //First create new room
        $newRoom = new Room();
        $newRoom->title = $this->room->title;
        $newRoom->code = $this->room->code;
        $newRoom->order = $this->room->order;
        $newRoom->general = $this->room->general;
        $newRoom->analysis = $this->room->analysis;
        $newRoom->extra = $this->room->extra;
        $newRoom->inspection_id = $this->room->inspection_id;
        $newRoom->floor_id = $this->room->floor_id;
        $newRoom->save();

        //Get & create all the parameters for the (new) room
        $gen = General::where('room_id', $this->room->id)->first();
        $basicAreas = BasicArea::where('room_id', $this->room->id)->get();
        $specificAreas = SpecificArea::where('room_id', $this->room->id)->get();
        $conformAreas = ConformArea::where('room_id', $this->room->id)->get();

        $extraGeneral = new General();

        $extraGeneral->inspection_id = $gen->inspection_id;
        $extraGeneral->room_id = $newRoom->id;
        $extraGeneral->floor_id = $gen->floor_id;

        $extraGeneral->order = $gen->order;
        $extraGeneral->cleanliness = $gen->cleanliness;
        $extraGeneral->painting = $gen->painting;
        $extraGeneral->analysis = $gen->analysis;
        $extraGeneral->extra = $gen->extra;

        $extraGeneral->created_at = now();
        $extraGeneral->updated_at = now();

        $extraGeneral->save();

        foreach($basicAreas as $newArea){
            $extraArea = new BasicArea();

            $extraArea->order = $newArea->area->order;
            $extraArea->room_id = $newRoom->id;
            $extraArea->area_id = $newArea->area_id;
            $extraArea->inspection_id = $newArea->inspection_id;
            $extraArea->floor_id = $newArea->floor_id;

            $extraArea->material = $newArea->material;
            $extraArea->color = $newArea->color;
            $extraArea->plinth = $newArea->plinth;
            $extraArea->analysis = $newArea->analysis;
            $extraArea->type = $newArea->type;
            $extraArea->handle = $newArea->handle;
            $extraArea->lists = $newArea->lists;
            $extraArea->key = $newArea->key;
            $extraArea->doorPump = $newArea->doorPump;
            $extraArea->doorStop = $newArea->doorStop;
            $extraArea->plaster = $newArea->plaster;
            $extraArea->finish = $newArea->finish;
            $extraArea->ventilationGrille = $newArea->ventilationGrille;
            $extraArea->glazing = $newArea->glazing;
            $extraArea->windowsill = $newArea->windowsill;
            $extraArea->rollerShutter = $newArea->rollerShutter;
            $extraArea->windowDecoration = $newArea->windowDecoration;
            $extraArea->hor = $newArea->hor;
            $extraArea->fallProtection = $newArea->fallProtection;
            $extraArea->energy = $newArea->energy;
            $extraArea->extra = $newArea->extra;

            $extraArea->created_at = now();
            $extraArea->updated_at = now();

            $extraArea->save();
        };

        foreach($specificAreas as $newArea){
            $extraArea = new SpecificArea();

            $extraArea->room_id = $newRoom->id;
            $extraArea->specific_id = $newArea->specific_id;
            $extraArea->inspection_id = $newArea->inspection_id;
            $extraArea->floor_id = $newArea->floor_id;

            $extraArea->handrail = $newArea->handrail;
            $extraArea->material = $newArea->material;
            $extraArea->shelves = $newArea->shelves;
            $extraArea->color = $newArea->color;
            $extraArea->present = $newArea->present;
            $extraArea->finish = $newArea->finish;
            $extraArea->dorpel = $newArea->dorpel;
            $extraArea->glassInlay = $newArea->glassInlay;
            $extraArea->handle = $newArea->handle;
            $extraArea->mailbox = $newArea->mailbox;
            $extraArea->peephole = $newArea->peephole;
            $extraArea->window = $newArea->window;
            $extraArea->doorBel = $newArea->doorBel;
            $extraArea->brand = $newArea->brand;
            $extraArea->type = $newArea->type;
            $extraArea->model = $newArea->model;
            $extraArea->doors = $newArea->doors;
            $extraArea->drawers = $newArea->drawers;
            $extraArea->rod = $newArea->rod;
            $extraArea->trap = $newArea->trap;
            $extraArea->mirror = $newArea->mirror;
            $extraArea->toiletPaperHolder = $newArea->toiletPaperHolder;
            $extraArea->cupboard = $newArea->cupboard;
            $extraArea->stop = $newArea->stop;
            $extraArea->crane = $newArea->crane;
            $extraArea->siphon = $newArea->siphon;
            $extraArea->angleCrane = $newArea->angleCrane;
            $extraArea->rinse = $newArea->rinse;
            $extraArea->seat = $newArea->seat;
            $extraArea->energy = $newArea->energy;
            $extraArea->cabLow = $newArea->cabLow;
            $extraArea->cabLowDoors = $newArea->cabLowDoors;
            $extraArea->cabLowDrawers = $newArea->cabLowDrawers;
            $extraArea->cabLowShelves = $newArea->cabLowShelves;
            $extraArea->cabHigh = $newArea->cabHigh;
            $extraArea->cabHighDoors = $newArea->cabHighDoors;
            $extraArea->cabHighDrawers = $newArea->cabHighDrawers;
            $extraArea->cabHighShelves = $newArea->cabHighShelves;
            $extraArea->cabinet = $newArea->cabinet;
            $extraArea->cabinetDoors = $newArea->cabinetDoors;
            $extraArea->cabinetDrawers = $newArea->cabinetDrawers;
            $extraArea->cabinetShelves = $newArea->cabinetShelves;
            $extraArea->CutleryDrawer = $newArea->CutleryDrawer;
            $extraArea->kitchenHandle = $newArea->kitchenHandle;
            $extraArea->filter = $newArea->filter;
            $extraArea->lighting = $newArea->lighting;
            $extraArea->manual = $newArea->manual;
            $extraArea->zones = $newArea->zones;
            $extraArea->bakingTray = $newArea->bakingTray;
            $extraArea->rooster = $newArea->rooster;
            $extraArea->shelf = $newArea->shelf;
            $extraArea->vegetableTray = $newArea->vegetableTray;
            $extraArea->doorBins = $newArea->doorBins;
            $extraArea->cutleryBasket = $newArea->cutleryBasket;
            $extraArea->floor = $newArea->floor;
            $extraArea->walls = $newArea->walls;
            $extraArea->shower = $newArea->shower;
            $extraArea->protection = $newArea->protection;
            $extraArea->casing = $newArea->casing;
            $extraArea->position = $newArea->position;
            $extraArea->vaporBarrier = $newArea->vaporBarrier;
            $extraArea->service = $newArea->service;
            $extraArea->analysis = $newArea->analysis;
            $extraArea->extra = $newArea->extra;

            $extraArea->created_at = now();
            $extraArea->updated_at = now();

            $extraArea->save();
        };

        foreach($conformAreas as $newArea){
            $extraArea = new ConformArea();

            $extraArea->room_id = $newRoom->id;
            $extraArea->conform_id = $newArea->conform_id;
            $extraArea->inspection_id = $newArea->inspection_id;
            $extraArea->floor_id = $newArea->floor_id;

            $extraArea->material = $newArea->material;
            $extraArea->color = $newArea->color;
            $extraArea->present = $newArea->present;
            $extraArea->single = $newArea->single;
            $extraArea->multiple = $newArea->multiple;
            $extraArea->brand = $newArea->brand;
            $extraArea->electronics = $newArea->electronics;
            $extraArea->phone = $newArea->phone;
            $extraArea->internet = $newArea->internet;
            $extraArea->audio = $newArea->audio;
            $extraArea->type = $newArea->type;
            $extraArea->count = $newArea->count;
            $extraArea->analysis = $newArea->analysis;
            $extraArea->extra = $newArea->extra;

            $extraArea->created_at = now();
            $extraArea->updated_at = now();

            $extraArea->save();
        };

        Session::flash('successAdd', 'succes!');
        $this->emit('renderNewArea');
    }


    public function render()
    {
        return view('livewire.general.add-room');
    }
}
