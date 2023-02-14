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
    public $dynamic;

    //--> Custom
    public string $element = "count";
    public string $title = "Aantal";

    public function mount(TechniqueArea $techniqueArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
        $this->techniqueArea = $techniqueArea;
        $el = $this->element;

        if(in_array($this->techniqueArea->$el, $this->parameters)){
            $this->dynamic = null;
        }else {
            $this->dynamic = $this->techniqueArea->$el;
        }
    }

    public function select($title)
    {
        $technique = $this->techniqueArea;
        $el = $this->element;
        $technique->$el = $title;
        $technique->update();

        //Render
        $this->status = 'active';
        $this->dynamic = null;
    }

    public function submitDynamic()
    {
        $technique = $this->techniqueArea;
        $el = $this->element;
        $technique->$el = $this->dynamic;
        $technique->update();

        //Render
        $this->techniqueArea = $technique;
    }

    public function render()
    {
        return view('livewire.elements.technique.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}
