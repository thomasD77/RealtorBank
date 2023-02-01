<?php

namespace App\Http\Livewire\Basic;

use App\Models\BasicArea;
use App\Models\Data;
use Livewire\Component;

class Colors extends Component
{
    public BasicArea $basicArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "color";
    public string $title = "Kleuren";

    public function mount(BasicArea $basicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getColors();
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
