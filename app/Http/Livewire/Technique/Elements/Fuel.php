<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Models\Data;
use App\Models\TechniqueArea;
use Livewire\Component;

class Fuel extends Component
{
    public TechniqueArea $techniqueArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "fuel";
    public string $title = "Brandstof";

    public function mount(TechniqueArea $techniqueArea)
    {
        //--> Custom
        $this->parameters = TechniqueArea::getFuels();
        $this->techniqueArea = $techniqueArea;
    }

    public function select($title)
    {
        $technique = $this->techniqueArea;
        $el = $this->element;

        $technique->$el = $title;
        $this->status = 'active';
        $technique->update();
    }

    public function render()
    {
        return view('livewire.elements.technique.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}
