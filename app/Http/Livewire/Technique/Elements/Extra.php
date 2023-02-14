<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Models\ConformArea;
use App\Models\Data;
use App\Models\TechniqueArea;
use Livewire\Component;

class Extra extends Component
{
    public TechniqueArea $techniqueArea;
    public $status = "";
    public $extra;

    public function mount(TechniqueArea $techniqueArea)
    {
        $this->techniqueArea = $techniqueArea;
        $this->extra = $techniqueArea->extra;
    }

    public function openExtra()
    {
        $this->status = 'active';
    }

    public function submit()
    {
        $technique = $this->techniqueArea;
        $technique->extra = $this->extra;
        $technique->update();
    }

    public function render()
    {
        return view('livewire.elements.extra');
    }
}
