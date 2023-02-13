<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Models\TechniqueArea;
use Livewire\Component;

class Model extends Component
{
    public TechniqueArea $techniqueArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "model";
    public string $title = "Model";

    public function mount(TechniqueArea $techniqueArea)
    {
        //--> Custom
        $this->parameters = TechniqueArea::getModels();
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
