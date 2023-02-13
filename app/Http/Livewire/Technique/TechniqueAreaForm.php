<?php

namespace App\Http\Livewire\Technique;

use App\Models\Inspection;
use App\Models\Technique;
use App\Models\TechniqueArea;
use Livewire\Component;

class TechniqueAreaForm extends Component
{
    public Inspection $inspection;
    public Technique $technique;
    public TechniqueArea $techniqueArea;

    public function mount(Inspection $inspection, Technique $technique, TechniqueArea $techniqueArea)
    {
        $this->inspection = $inspection;
        $this->technique = $technique;
        $this->techniqueArea = $techniqueArea;
    }

    public function render()
    {
        return view('livewire.technique.technique-area-form', [
            'inspection' => $this->inspection,
            'technique' => $this->technique,
            'techniqueArea' => $this->techniqueArea
        ]);
    }
}
