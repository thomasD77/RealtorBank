<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Models\BasicArea;
use App\Models\Data;
use Livewire\Component;

class Key extends Component
{
    public BasicArea $basicArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "key";
    public string $title = "Sleutels";

    public function mount(BasicArea $basicArea)
    {
        //--> Custom
        $this->parameters = Data::getPresent();
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
        return view('livewire.elements.basic.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}