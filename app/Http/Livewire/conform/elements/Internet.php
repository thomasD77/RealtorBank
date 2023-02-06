<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Models\ConformArea;
use App\Models\Data;
use Livewire\Component;

class Internet extends Component
{
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "internet";
    public string $title = "Internet";

    public function mount(ConformArea $conformArea)
    {
        //--> Custom
        $this->parameters = Data::getNumbers();
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