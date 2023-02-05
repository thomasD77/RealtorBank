<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Analysis extends Component
{
    public SpecificArea $specificArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "analysis";
    public string $title = "Analyse";

    public function mount(SpecificArea $specificArea)
    {
        //--> Custom
        $this->parameters = Data::getAnalysis();
        $this->specificArea = $specificArea;
    }

    public function select($title)
    {
        $specific = $this->specificArea;
        $el = $this->element;

        $specific->$el = $title;
        $this->status = 'active';
        $specific->update();
    }

    public function render()
    {
        return view('livewire.elements.specific.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}
