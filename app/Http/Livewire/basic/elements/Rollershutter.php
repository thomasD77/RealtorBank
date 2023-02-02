<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Models\BasicArea;
use Livewire\Component;

class Rollershutter extends Component
{
    public BasicArea $basicArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "rollerShutter";
    public string $title = "Rolluiken";

    public function mount(BasicArea $basicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getRollShutters();
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
        return view('livewire.elements.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}
