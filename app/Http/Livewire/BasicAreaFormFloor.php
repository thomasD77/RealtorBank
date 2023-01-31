<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Data;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class BasicAreaFormFloor extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Area $area;
    public BasicArea $basicArea;

    public string $statusMaterial = 'active';
    public string $statusColor = '';
    public string $statusPlinth = '';
    public string $statusAnalysis = '';
    public string $statusMedia = '';
    public string $statusExtra = '';
    public $extra;

    public function mount(Inspection $inspection, Room $room, Area $area)
    {
        $this->inspection = $inspection;
        $this->area = $area;
        $this->room = $room;
        $this->basicArea = BasicArea::where('room_id', $room->id)->first();
    }

    public function selectMaterial($title)
    {
        $area = $this->basicArea;
        $area->material = $title;
        $this->statusMaterial = 'active';
        $this->statusColor = '';
        $area->update();
    }

    public function selectColor($title)
    {
        $area = $this->basicArea;
        $area->color = $title;
        $this->statusColor = 'active';
        $this->statusMaterial = '';
        $area->update();
    }

    public function selectPlinth($title)
    {
        $area = $this->basicArea;
        $area->plinth = $title;
        $this->statusPlinth = 'active';
        $this->statusColor = '';
        $this->statusMaterial = '';
        $area->update();
    }

    public function selectAnalysis($title)
    {
        $area = $this->basicArea;
        $area->analysis = $title;
        $this->statusAnalysis = 'active';
        $this->statusPlinth = '';
        $this->statusColor = '';
        $this->statusMaterial = '';
        $area->update();
    }

    public function openExtra()
    {
        $this->statusExtra = 'active';
        $this->statusMedia = '';
        $this->statusAnalysis = '';
        $this->statusPlinth = '';
        $this->statusColor = '';
        $this->statusMaterial = '';
    }

    public function render()
    {
        $materials = BasicArea::getMaterials();
        $colors = BasicArea::getColors();
        $plinths = BasicArea::getPlinths();
        $analysis = Data::getAnalysis();

        $area = $this->basicArea;
        $area->extra = $this->extra;
        $area->update();

        return view('livewire.basic-area-form-floor', [
            'materials' => $materials,
            'colors' => $colors,
            'plinths' => $plinths,
            'analysis' => $analysis,
            'area' => $this->area
        ]);
    }
}
