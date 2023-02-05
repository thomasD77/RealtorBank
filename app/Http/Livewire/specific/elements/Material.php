<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Models\SpecificArea;
use Livewire\Component;

class Material extends Component
{
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "material";
    public string $title = "Materialen";

    public function mount(SpecificArea $specificArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getMaterials();
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
