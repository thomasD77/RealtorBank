<?php

namespace App\Http\Livewire\Basic\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\BasicArea;
use Livewire\Component;

class Materials extends MainDropdownComponent
{
    public BasicArea $basicArea;
    public string $status = "active";
    public $parameters;

    //--> Custom
    public string $element = "material";
    public string $title = "Materialen";

    public function mount(BasicArea $basicArea)
    {
        //--> Custom
        $this->parameters = BasicArea::getMaterials();
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
