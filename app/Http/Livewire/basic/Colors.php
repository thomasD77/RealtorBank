<?php

namespace App\Http\Livewire\Basic;

use App\Models\BasicArea;
use Livewire\Component;

class Colors extends Component
{
    public BasicArea $basicArea;
    public string $statusColor = '';

    public function mount(BasicArea $basicArea)
    {
        $this->basicArea = $basicArea;
    }

    public function selectColor($title)
    {
        $area = $this->basicArea;
        $area->color = $title;
        $this->statusColor = 'active';
        $area->update();
    }

    public function render()
    {
        $colors = BasicArea::getColors();

        return view('livewire.basic.colors', [
            'colors' => $colors,
        ]);
    }
}
