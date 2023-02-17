<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Types extends MainDropdownComponent
{
    public BasicArea $basicArea;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "type";
    public string $title = "Type";

    public function mount(BasicArea $basicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getTypes();
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
