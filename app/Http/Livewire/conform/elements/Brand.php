<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Models\ConformArea;
use Livewire\Component;

class Brand extends Component
{
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "brand";
    public string $title = "Merk";

    public function mount(ConformArea $conformArea)
    {
        //--> Custom
        $this->parameters = ConformArea::getBrands();
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
