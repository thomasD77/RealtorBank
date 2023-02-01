<?php

namespace App\Http\Livewire\Basic;

use App\Models\BasicArea;
use App\Models\Data;
use Livewire\Component;

class Analysis extends Component
{
    public BasicArea $basicArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "analysis";
    public string $title = "Analyse";

    public function mount(BasicArea $basicArea)
    {
        //--> Custom
        $this->parameters = Data::getAnalysis();
        $this->basicArea = $basicArea;
    }

    public function select($title)
    {
        $area = $this->basicArea;
        $el = $this->element;

        $area->$el = $title;
        $this->status = 'active';
        $area->update();
    }

    public function render()
    {
        return view('livewire.basic.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}
