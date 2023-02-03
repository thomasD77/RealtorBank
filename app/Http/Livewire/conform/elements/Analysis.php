<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Models\BasicArea;
use App\Models\Conform;
use App\Models\ConformArea;
use App\Models\Data;
use Livewire\Component;

class Analysis extends Component
{
    public ConformArea $conformArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "analysis";
    public string $title = "Analyse";

    public function mount(ConformArea $conformArea)
    {
        //--> Custom
        $this->parameters = Data::getAnalysis();
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
