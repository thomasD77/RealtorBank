<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Contract;
use App\Models\Inspection;
use App\Models\Situation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Contract $contract;
    public Situation $situation;
    public Inspection $inspection;

    public $date;
    public $lock;

    public function mount(Inspection $inspection, Contract $contract)
    {
        $this->inspection = $inspection;
        $this->situation = Situation::find($contract->situation_id);
        $this->contract = $contract;

        $this->date = $this->contract->date;
        $this->lock = $this->contract->lock;
    }

    public function changeDate()
    {
        $contract =  $this->contract;
        $contract->date = $this->date;
        $contract->update();
    }

    public function render()
    {
        $this->lock = $this->contract->lock;
        return view('livewire.contracts.edit');
    }
}
