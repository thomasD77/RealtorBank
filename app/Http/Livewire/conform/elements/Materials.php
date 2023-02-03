<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Models\BasicArea;
use App\Models\ConformArea;
use Livewire\Component;

class Materials extends Component
{
    public string $status = "active";
    public $parameters;

    //--> Custom
    public string $element = "material";
    public string $title = "Materialen";

    public function mount(ConformArea $conformArea)
    {
        //--> Custom
        $this->parameters = ConformArea::getMaterials();
        $this->conformArea = $conformArea;
    }

    public function select($title)
    {
        $conform = $this->conformArea;
        $el = $this->element;

        $conform->$el = $title;
        $this->status = 'active';
        $conform->update();
    }

    public function render()
    {
        return view('livewire.elements.conform.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}
