<?php

namespace App\Http\Livewire\Agreement;

use App\Models\Agreement;
use App\Models\Calculation;
use App\Models\Damage;
use App\Models\Inspection;
use App\Models\Quote;
use App\Models\QuoteDamage;
use App\Models\QuoteSubCalculation;
use App\Models\Situation;
use Livewire\Component;

class EditWithPricing extends Component
{
    public Inspection $inspection;
    public Situation $situation;
    public Damage $damage;
    public Quote $quote;
    public Agreement $agreement;

    public $damages;
    public $date;
    public $lock;
    public $subsTotal;
    public $remarks;
    public $adjustedTotal;

    public function mount(Inspection $inspection, Situation $situation, Quote $quote, Agreement $agreement)
    {
        $this->inspection = $inspection;
        $this->situation = $situation;
        $this->quote = $quote;
        $this->agreement = $agreement;
        $this->remarks = $agreement->remarks;
        $this->adjustedTotal = $agreement->adjusted_total;

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

        $quoteIds = Calculation::where('inspection_id', $this->inspection->id)->pluck('id');
        $subs = QuoteSubCalculation::query()
            ->where('quote_id', $this->quote->id)
            ->whereIn('quote_calculation_id', $quoteIds)
            ->where('approved', 1)
            ->get();

        foreach ($subs as $sub){
            $vetustate = $sub->calculation->vetustate;
            $quoteTotal = $sub->quote_total;
            $newAmount = $quoteTotal - ($quoteTotal * ($vetustate / 100));
            $this->subsTotal += $newAmount;
        }
    }

    public function changeRemarks()
    {
        if ($this->agreement) {
            $this->agreement->remarks = $this->remarks;
            $this->agreement->save();
        }
    }

    public function updateAdjustedTotal()
    {
        if ($this->agreement) {
            $this->agreement->adjusted_total = $this->adjustedTotal;
            $this->agreement->save();
        }
    }

    public function render()
    {
        return view('livewire.agreement.create-with-pricing');
    }
}
