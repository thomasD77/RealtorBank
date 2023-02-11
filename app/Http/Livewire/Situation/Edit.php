<?php

namespace App\Http\Livewire\Situation;

use App\Models\Inspection;
use Livewire\Component;

class Edit extends Component
{
    public Inspection $inspection;


    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
    }

    public function render()
    {

        return view('livewire.situation.edit');
    }
}
