<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Data;
use App\Models\Inspection;
use App\Models\Room;
use Livewire\Component;

class BasicAreaFormCelling extends Component
{
    public Inspection $inspection;
    public Room $room;
    public Area $area;
    public BasicArea $basicArea;

    public string $statusMaterial = 'active';
    public string $statusColor = '';
    public string $statusType = '';
    public string $statusAnalysis = '';
    public string $statusMedia = '';
    public string $statusExtra = '';
    public string $extra;

    public function mount(Inspection $inspection, Room $room, Area $area)
    {
        $this->inspection = $inspection;
        $this->room = $room;
        $this->area = $area;
        $this->basicArea = BasicArea::query()
            ->where('room_id', $room->id)
            ->where('area_id', $area->id)
            ->first();
    }

    public function selectType($title)
    {
        $area = $this->basicArea;
        $area->type = $title;
        $this->statusExtra = '';
        $this->statusMedia = '';
        $this->statusAnalysis = '';
        $this->statusType = 'active';
        $this->statusColor = '';
        $this->statusMaterial = '';
        $area->update();
    }

    public function selectMaterial($title)
    {
        $area = $this->basicArea;
        $area->material = $title;
        $this->statusExtra = '';
        $this->statusMedia = '';
        $this->statusAnalysis = '';
        $this->statusType = '';
        $this->statusColor = '';
        $this->statusMaterial = 'active';
        $area->update();
    }

    public function selectColor($title)
    {
        $area = $this->basicArea;
        $area->color = $title;
        $this->statusExtra = '';
        $this->statusMedia = '';
        $this->statusAnalysis = '';
        $this->statusType = '';
        $this->statusColor = 'active';
        $this->statusMaterial = '';
        $area->update();
    }

    public function selectAnalysis($title)
    {
        $area = $this->basicArea;
        $area->analysis = $title;
        $this->statusExtra = '';
        $this->statusMedia = '';
        $this->statusAnalysis = 'active';
        $this->statusType = '';
        $this->statusColor = '';
        $this->statusMaterial = '';
        $area->update();
    }

    public function openExtra()
    {
        $this->statusExtra = 'active';
        $this->statusMedia = '';
        $this->statusAnalysis = '';
        $this->statusType = '';
        $this->statusColor = '';
        $this->statusMaterial = '';
    }



    public function render()
    {
        $materials = BasicArea::getMaterials();
        $colors = BasicArea::getColors();
        $types = BasicArea::getTypes();
        $analysis = Data::getAnalysis();

        $area = $this->basicArea;
        $area->extra = $this->extra;
        $area->update();

        return view('livewire.basic-area-form-celling', [
            'materials' => $materials,
            'colors' => $colors,
            'types' => $types,
            'analysis' => $analysis,
            'area' => $this->area
        ]);
    }
}
