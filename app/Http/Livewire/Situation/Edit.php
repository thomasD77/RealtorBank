<?php

namespace App\Http\Livewire\Situation;

use App\Models\Category;
use App\Models\Contract;
use App\Models\Inspection;
use App\Models\Situation;
use App\Models\Tenant;
use Livewire\Component;

class Edit extends Component
{
    public Inspection $inspection;
    public Situation $situation;
    public Tenant $tenant;
    public $intrede;
    public $extra;
    public $contract;

    public $name;
    public $email;
    public $phone;
    public $date;


    public function mount(Inspection $inspection, Situation $situation)
    {
        $this->inspection = $inspection;
        $this->situation = $situation;
        $this->tenant = $this->situation->tenant;
        $this->intrede = $this->situation->intrede;
        $this->extra = $this->situation->extra;
        $this->name = $this->situation->tenant->name;
        $this->email = $this->situation->tenant->email;
        $this->phone = $this->situation->tenant->phone;
        $this->date = $this->situation->date;

        $this->contract = Contract::query()
            ->where('inspection_id', $inspection->id)
            ->where('situation_id', $situation->id)
            ->first();
    }

    public function intredeSubmit($value)
    {
        $this->situation->intrede = $value;
        $this->situation->update();
        $this->intrede = $this->situation->intrede;
    }

    public function locationSubmit()
    {
        $this->tenant->name = $this->name;
        $this->tenant->email = $this->email;
        $this->tenant->phone = $this->phone;
        $this->tenant->update();

        $this->situation->date = $this->date;
        $this->situation->update();
        session()->flash('successLocation', 'success!');
    }

    public function extraSubmit()
    {
        $this->situation->extra = $this->extra;
        $this->situation->update();
        $this->extra = $this->situation->extra;
        session()->flash('successExtra', 'success!');
    }

    public function deleteSituation()
    {
        $situation = $this->situation;
        $situation->delete();

        return redirect()->route('situation.index', $this->inspection);
    }

}
