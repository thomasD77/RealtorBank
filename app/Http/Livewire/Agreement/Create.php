<?php

namespace App\Http\Livewire\Agreement;

use App\Models\Agreement;
use App\Models\Damage;
use App\Models\Inspection;
use App\Models\Quote;
use App\Models\QuoteCalculation;
use App\Models\QuoteDamage;
use App\Models\Situation;
use Livewire\Component;

class Create extends Component
{
    public Inspection $inspection;
    public Situation $situation;
    public Damage $damage;
    public Quote $quote;
    public Agreement $agreement;

    public $damages;
    public $date;
    public $lock;

    public function mount(Inspection $inspection, Situation $situation, Quote $quote, Agreement $agreement)
    {
        $this->inspection = $inspection;
        $this->situation = $situation;
        $this->quote = $quote;
        $this->agreement = $agreement;

        $this->damages = QuoteDamage::query()
            ->with([
                'basicArea.floor',
                'basicArea.area',
                'basicArea.room',
                'specificArea.floor',
                'specificArea.specific',
                'specificArea.room',
                'conformArea.floor',
                'conformArea.conform',
                'conformArea.room',
                'general.floor',
                'general.room',
                'techniqueArea.technique',
                'outdoorArea.floor',
                'outdoorArea.outdoor',
                'outdoorArea.room'
            ])
            ->where('quote_id', $this->quote->id)
            ->where('inspection_id', $this->inspection->id)
            ->orderBy('basic_id')
            ->orderBy('specific_id')
            ->orderBy('conform_id')
            ->orderBy('general_id')
            ->orderBy('technique_id')
            ->orderBy('outdoor_id')
            ->where('damage_print_pdf', 1)
            ->where('approved', 1)
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
        return view('livewire.agreement.create');
    }
}
