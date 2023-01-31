<?php

namespace App\Http\Livewire\Basic;

use App\Models\BasicArea;
use App\Models\Data;
use Livewire\Component;

class Analysis extends Component
{
    public BasicArea $basicArea;
    public $statusAnalysis = "";

    public function mount(BasicArea $basicArea)
    {
        $this->basicArea = $basicArea;
    }

    public function selectAnalysis($title)
    {
        $area = $this->basicArea;
        $area->analysis = $title;
        $this->statusAnalysis = 'active';
        $area->update();
    }

    public function render()
    {
        $analysis = Data::getAnalysis();

        return view('livewire.basic.analysis', [
            'analysis' => $analysis,
        ]);
    }
}
