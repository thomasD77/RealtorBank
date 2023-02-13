<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Models\TechniqueArea;
use Livewire\Component;

class Media extends Component
{
    public TechniqueArea $techniqueArea;
    public $status = "";

    public function mount(TechniqueArea $techniqueArea)
    {
        $this->techniqueArea = $techniqueArea;
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
