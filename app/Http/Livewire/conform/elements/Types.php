<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Models\ConformArea;
use Livewire\Component;

class Types extends Component
{
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "type";
    public string $title = "Type";

    public function mount(ConformArea $conformArea)
    {
        //--> Custom
        $this->parameters = ConformArea::getTypes();
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
