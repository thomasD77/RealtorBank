<?php

namespace App\Http\Livewire\Claims;

use App\Models\Damage;
use App\Models\Inspection;
use App\Models\RentalClaim;
use App\Models\Situation;
use Livewire\Component;

class Edit extends Component
{
    //Models
    public Situation $situation;
    public Inspection $inspection;
    public RentalClaim $claim;

    //Variables
    public $damages;
    public $date;
    public $lock;

    public function mount(Inspection $inspection, RentalClaim $claim)
    {
        $this->inspection = $inspection;
        $this->situation = Situation::find($claim->situation_id);
        $this->claim = $claim;

        $this->damages = Damage::query()
            ->where('inspection_id', $this->inspection->id)
            ->where('print_pdf', 1)
            ->orderBy('date', 'desc')
            ->get();
    }

    public function changeDate()
    {
        if($this->date){
            $claim =  $this->claim;
            $claim->date = $this->date;
            $claim->update();
        }
    }
    public function render()
    {
        $this->lock = $this->claim->lock;
        return view('livewire.claims.edit');
    }
}
