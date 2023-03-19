<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Contract;
use App\Models\Inspection;
use App\Models\Situation;
use Livewire\Component;

class Edit extends Component
{
    public Contract $contract;
    public Situation $situation;

    public $realtor;
    public $date;

    public function mount(Inspection $inspection, Contract $contract)
    {
        $this->contract = $contract;
        $this->situation = Situation::find($contract->situation_id);

        $this->date = $this->contract->date;
        $this->realtor = Auth()->user();

    }

    public function render()
    {
        return view('livewire.contracts.edit');
    }
}
