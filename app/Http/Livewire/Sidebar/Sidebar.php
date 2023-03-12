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
        $this->activeTemplate = Auth()->user()->template;

        if(Auth()->user()->category){
            $this->activeCat = Auth()->user()->category->id;
        }
        if(Auth()->user()->room){
            $this->activeRoom = Auth()->user()->room->id;
        }
        if(Auth()->user()->floor){
            $this->activeFloor = Auth()->user()->floor->id;
        }
        if(Auth()->user()->area){
            $this->activeArea = Auth()->user()->area->id;
        }

        $this->situation = Category::where('title', CategoryKey::Situation)->pluck('id')->first();
        $this->interior = Category::where('title', CategoryKey::Interior)->pluck('id')->first();
        $this->exterior = Category::where('title', CategoryKey::Exterior)->pluck('id')->first();
        $this->techniques = Category::where('title', CategoryKey::Techniques)->pluck('id')->first();
        $this->documents = Category::where('title', CategoryKey::Documents)->pluck('id')->first();
        $this->keys = Category::where('title', CategoryKey::Keys)->pluck('id')->first();
        $this->meters = Category::where('title', CategoryKey::Meters)->pluck('id')->first();
        $this->outHouse = Category::where('title', CategoryKey::OutHouse)->pluck('id')->first();

        $this->basement = Floor::where('code', FloorKey::BasementFloor)->pluck('id')->first();
        $this->groundFloor = Floor::where('code', FloorKey::GroundFloor)->pluck('id')->first();
        $this->upperFloor = Floor::where('code', FloorKey::UpperFloor)->pluck('id')->first();
        $this->attic = Floor::where('code', FloorKey::Attic)->pluck('id')->first();
        $this->garage = Floor::where('code', FloorKey::Garage)->pluck('id')->first();
        $this->building = Floor::where('code', FloorKey::Building)->pluck('id')->first();
        $this->driveWay = Floor::where('code', FloorKey::DriveWay)->pluck('id')->first();
        $this->outHouseIn = Floor::where('code', FloorKey::OutHouse)->pluck('id')->first();
        $this->outHouseEx = Floor::where('code', FloorKey::OutHouse)->pluck('id')->first();

        $this->basementParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::BasementFloor)->first()->id)
            ->get();

        $this->groundFloorParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::GroundFloor)->first()->id)
            ->get();

        $this->upperFloorParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::UpperFloor)->first()->id)
            ->get();

        $this->atticParam = Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Attic)->first()->id)
            ->get();

        $this->garageParam =  Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Garage)->first()->id)
            ->get();

        $this->outHouseInParam =  Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::DriveWay)->first()->id)
            ->get();

        $this->outHouseExParam =  Room::with([
            'basicAreas',
            'basicAreas.area',
            'specificAreas', 'specificAreas.specific',
            'conformAreas',
            'conformAreas.conform'
            ])->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::OutHouse)->first()->id)
            ->get();

        $this->buildingParam = Room::with(['outdoorAreas', 'outdoorAreas.outdoor'])
            ->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::Building)->first()->id)
            ->get();

        $this->driveWayParam = Room::with(['outdoorAreas', 'outdoorAreas.outdoor'])
            ->where('inspection_id', $this->inspection->id)
            ->where('floor_id', Floor::where('code', FloorKey::DriveWay)->first()->id)
            ->get();

        $this->techniqueParam = Technique::query()
            ->select('id', 'title')
            ->get();
    }

    public function toggleCategory($value)
    {
        SidebarToggle::sidebarCategory($value);
        //Render
        $this->activeCat = $value;
        $this->activeArea = null;
    }

    public function toggleRoom($value)
    {
        SidebarToggle::sidebarRoom($value);
    }

    public function toggleTemplate($value)
    {
      SidebarToggle::sidebarTemplate($value);
    }

    public function toggleFloor($value)
    {
        SidebarToggle::sidebarFloor($value);
    }

    public function render()
    {
        return view('livewire.sidebar.sidebar');
    }
}
