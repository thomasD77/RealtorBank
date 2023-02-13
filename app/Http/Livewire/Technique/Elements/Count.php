<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Models\Data;
use App\Models\TechniqueArea;
use Livewire\Component;

class Count extends Component
{
    public TechniqueArea $techniqueArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "count";
    public string $title = "Aantal";

    public function mount(TechniqueArea $techniqueArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
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
