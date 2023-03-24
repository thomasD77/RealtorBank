<?php

namespace App\Http\Livewire\Situation;

use App\Models\Inspection;
use App\Models\Situation;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public Inspection $inspection;
    public $current_situation;
    public $current_situation_out;

    use WithPagination;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
    }

    public function render()
    {
        $situations = Situation::query()
            ->orderBy('date')
            ->where('inspection_id', $this->inspection->id)
            ->with('tenant')
            ->simplePaginate(9);

        return view('livewire.situation.index', [
            'situations' => $situations
        ]);
    }
}
