<?php

namespace App\Http\Livewire\General\Elements;

use App\Models\Data;
use App\Models\General;
use Livewire\Component;

class Cleanliness extends Component
{
    public General $general;
    public string $status = "";
    public $parameters;

    //--> Custom
    public string $element = "cleanliness";
    public string $title = "Netheid";

    public function mount(General $general)
    {
        //--> Custom
        $this->parameters = Data::getStatus();
        $this->general = $general;
    }

    public function select($title)
    {
        $general = $this->general;
        $el = $this->element;

        $general->$el = $title;
        $this->status = 'active';
        $general->update();
    }

    public function render()
    {
        return view('livewire.elements.general.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}
