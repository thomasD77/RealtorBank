<?php

namespace App\Http\Livewire\Situation;

use App\Models\Inspection;
use App\Models\Situation;
use Livewire\Component;

class Index extends Component
{
    public Inspection $inspection;
    public $situations;
    public $current_situation;
    public $current_situation_out;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->situations = Situation::query()
            ->orderBy('date')
            ->where('inspection_id', $this->inspection->id)
            ->get();

        $this->current_situation = Situation::query()
            ->orderBy('date')
            ->where('inspection_id', $this->inspection->id)
            ->whereNotNull('intrede')
            ->first();

        $this->current_situation_out = Situation::query()
            ->orderBy('date')
            ->where('inspection_id', $this->inspection->id)
            ->where('intrede', '=' ,0)
            ->first();
    }

    public function render()
    {
        return view('livewire.situation.index');
    }
}
