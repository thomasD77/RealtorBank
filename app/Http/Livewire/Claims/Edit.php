<?php

namespace App\Http\Livewire\Claims;

use App\Models\Damage;
use App\Models\Inspection;
use App\Models\RentalClaim;
use App\Models\Situation;
use Illuminate\Support\Facades\DB;
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
    public $relation_intrede;

    public function mount(Inspection $inspection, RentalClaim $claim)
    {
        $this->inspection = $inspection;
        $this->situation = Situation::find($claim->situation_id);
        $this->claim = $claim;

        // Haal alle damage_id's op die aan de situatie gekoppeld zijn en print_pdf = 1 hebben
        $damageIds = DB::table('damages_situations')
            ->where('situation_id', $this->situation->id)
            ->where('print_pdf', 1)
            ->pluck('damage_id'); // Haalt alleen de ID's op

        // Haal alle Damage records op met de gevonden damage_id's
        $this->damages = Damage::whereIn('id', $damageIds)
            ->orderByDesc('date') // Sorteer op datum (nieuwste eerst)
            ->get();
        
        // Addendum is always a document added to the latest 'INTREDE'
        $this->relation_intrede = Situation::where('inspection_id', $this->inspection->id)
            ->where('intrede', 1)
            ->orderBy('date', 'desc')
            ->first();
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
