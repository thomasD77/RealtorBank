<?php

namespace App\Http\Livewire\Sidebar;

use App\Enums\CategoryKey;
use App\Enums\FloorKey;
use App\Enums\RoomKey;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\OutdoorArea;
use App\Models\Room;
use App\Models\SidebarToggle;
use App\Models\Technique;
use App\Models\TechniqueArea;
use Livewire\Component;

class Sidebar extends Component
{
    public Inspection $inspection;
    public $responsive;

    public $activeCat;
    public $activeFloor;
    public $activeRoom;
    public $activeTemplate;
    public $activeArea;

    //Empty collapses
    public $situation;
    public $interior;
    public $exterior;
    public $techniques;
    public $basement;
    public $groundFloor;
    public $upperFloor;
    public $attic;
    public $garage;
    public $documents;
    public $keys;
    public $meters;
    public $building;
    public $driveWay;
    public $outHouse;
    public $outHouseIn;
    public $outHouseEx;
    public $contracts;

    //Models
    public $basementParam;
    public $groundFloorParam;
    public $upperFloorParam;
    public $atticParam;
    public $garageParam;
    public $buildingParam;
    public $driveWayParam;
    public $techniqueParam;
    public $outHouseInParam;
    public $outHouseExParam;

    public $basic = 'basic';
    public $specific = 'specific';
    public $conform = 'conform';

    protected $listeners = ['renderNewArea' => 'render'];

    public function mount(Inspection $inspection, $responsive)
    {
        if($responsive == true){
            $this->responsive = 'responsive';
        }
        $this->inspection = $inspection;
        $this->activeTemplate = Auth()->user()->sidebar_template;

        //Extra note here :: This can be confusing but we do not
        if(Auth()->user()->sidebar_category_id){
            $this->activeCat = Auth()->user()->sidebar_category_id;
        }
        if(Auth()->user()->sidebar_room_id){
            $this->activeRoom = Auth()->user()->sidebar_room_id;
        }
        if(Auth()->user()->sidebar_floor_id){
            $this->activeFloor = Auth()->user()->sidebar_floor_id;
        }
        if(Auth()->user()->sidebar_area_id){
            $this->activeArea = Auth()->user()->sidebar_area_id;
        }

        $this->situation = Category::where('title', CategoryKey::Situation)->pluck('id')->first();
        $this->interior = Category::where('title', CategoryKey::Interior)->pluck('id')->first();
        $this->exterior = Category::where('title', CategoryKey::Exterior)->pluck('id')->first();
        $this->techniques = Category::where('title', CategoryKey::Techniques)->pluck('id')->first();
        $this->documents = Category::where('title', CategoryKey::Documents)->pluck('id')->first();
        $this->keys = Category::where('title', CategoryKey::Keys)->pluck('id')->first();
        $this->meters = Category::where('title', CategoryKey::Meters)->pluck('id')->first();
        $this->outHouse = Category::where('title', CategoryKey::OutHouse)->pluck('id')->first();
        $this->contracts = Category::where('title', CategoryKey::Contracts)->pluck('id')->first();

        $this->basement = Floor::where('code', FloorKey::BasementFloor)->pluck('id')->first();
        $this->groundFloor = Floor::where('code', FloorKey::GroundFloor)->pluck('id')->first();
        $this->upperFloor = Floor::where('code', FloorKey::UpperFloor)->pluck('id')->first();
        $this->attic = Floor::where('code', FloorKey::Attic)->pluck('id')->first();
        $this->garage = Floor::where('code', FloorKey::Garage)->pluck('id')->first();
        $this->building = Floor::where('code', FloorKey::Building)->pluck('id')->first();
        $this->driveWay = Floor::where('code', FloorKey::DriveWay)->pluck('id')->first();
        $this->outHouseIn = Floor::where('code', FloorKey::OutHouse)->pluck('id')->first();
        $this->outHouseEx = Floor::where('code', FloorKey::OutHouse)->pluck('id')->first();
    }

    public function toggleCategory($value)
    {
        $catID = SidebarToggle::sidebarCategory($value);
        //Render
        $this->activeCat = $catID;
        $this->activeArea = null;
        $this->emit('renderNewArea');
    }

    public function toggleFloor($value)
    {
        $floorID = SidebarToggle::sidebarFloor($value);
        $this->activeFloor = $floorID;
        $this->emit('renderNewArea');
    }

    public function toggleRoom($value)
    {
        $this->activeRoom = null;
        $roomID = SidebarToggle::sidebarRoom($value);
        $this->activeRoom = $roomID;
        $this->activeTemplate = null;
        $this->emit('renderNewArea');
    }

    public function toggleTemplate($value)
    {
      $templateID = SidebarToggle::sidebarTemplate($value);
      $this->activeTemplate = $templateID;
      $this->emit('renderNewArea');
    }



    public function render()
    {
        if($this->activeCat == $this->interior || $this->activeCat == null){
            $this->basementParam = Room::with([
                'basicAreas',
                'basicAreas.area',
                'specificAreas', 'specificAreas.specific',
                'conformAreas',
                'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::BasementFloor)->first()->id)
                ->get();
        }

        if($this->activeCat == $this->interior || $this->activeCat == null){
            $this->groundFloorParam = Room::with([
                'basicAreas',
                'basicAreas.area',
                'specificAreas', 'specificAreas.specific',
                'conformAreas',
                'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
                ->get();
        }

        if($this->activeCat == $this->interior || $this->activeCat == null){
            $this->upperFloorParam = Room::with([
                'basicAreas',
                'basicAreas.area',
                'specificAreas', 'specificAreas.specific',
                'conformAreas',
                'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::UpperFloor)->first()->id)
                ->get();
        }

        if($this->activeCat == $this->interior || $this->activeCat == null) {
            $this->atticParam = Room::with([
                'basicAreas',
                'basicAreas.area',
                'specificAreas', 'specificAreas.specific',
                'conformAreas',
                'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::Attic)->first()->id)
                ->get();
        }

        if($this->activeCat == $this->interior || $this->activeCat == null) {
            $this->garageParam = Room::with([
                'basicAreas',
                'basicAreas.area',
                'specificAreas', 'specificAreas.specific',
                'conformAreas',
                'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::Garage)->first()->id)
                ->get();
        }

        if($this->activeCat == $this->exterior || $this->activeCat == null) {
            $this->buildingParam = Room::with(['outdoorAreas', 'outdoorAreas.outdoor'])
                ->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::Building)->first()->id)
                ->get();
        }

        if($this->activeCat == $this->exterior || $this->activeCat == null) {
            $this->driveWayParam = Room::with(['outdoorAreas', 'outdoorAreas.outdoor'])
                ->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::DriveWay)->first()->id)
                ->get();
        }

        if($this->activeCat == $this->techniques || $this->activeCat == null) {
            $this->techniqueParam = Technique::query()
                ->select('id', 'title')
                ->get();
        }

        if($this->activeCat == $this->outHouse || $this->activeCat == null) {
            $this->outHouseInParam =  Room::with([
                'basicAreas',
                'basicAreas.area',
                'specificAreas', 'specificAreas.specific',
                'conformAreas',
                'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::DriveWay)->first()->id)
                ->get();
        }

        if($this->activeCat == $this->outHouse || $this->activeCat == null) {
            $this->outHouseExParam =  Room::with([
                'basicAreas',
                'basicAreas.area',
                'specificAreas', 'specificAreas.specific',
                'conformAreas',
                'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
                ->where('floor_id', Floor::where('code', FloorKey::OutHouse)->first()->id)
                ->get();
        }

        return view('livewire.sidebar.sidebar');
    }
}
