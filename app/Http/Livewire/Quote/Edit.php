<?php

namespace App\Http\Livewire\Quote;

use App\Models\Agreement;
use App\Models\Damage;
use App\Models\Inspection;
use App\Models\Invoice;
use App\Models\InvoiceDamage;
use App\Models\PDF;
use App\Models\Quote;
use App\Models\QuoteCalculation;
use App\Models\QuoteDamage;
use App\Models\QuoteSubCalculation;
use App\Models\Situation;
use Livewire\Component;

class Edit extends Component
{
    public Inspection $inspection;
    public Situation $situation;
    public Damage $damage;
    public Quote $quote;

    public $title;
    public $date;
    public $remarks;

    public $quoteDamages;
    public $quoteTotal;
    public $agreements;

    public function mount(Inspection $inspection, Situation $situation, Quote $quote)
    {
        $this->inspection = $inspection;
        $this->situation = $situation;
        $this->quote = $quote;

        $this->title = $this->quote->title;
        $this->date = $this->quote->date;
        $this->remarks = $this->quote->remarks;

        $this->quoteDamages = QuoteDamage::query()
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
            ->get();

        $this->agreements = Agreement::query()
            ->where('inspection_id', $this->inspection->id)
            ->where('situation_id', $this->situation->id)
            ->where('quote_id', $this->quote->id)
            ->get();

        $this->quoteTotal = QuoteCalculation::where('quote_id', $this->quote->id)->sum('quote_final_total');
        $quoteIds = QuoteCalculation::where('quote_id', $quote->id)->pluck('id');
        $subsTotal = QuoteSubCalculation::query()
            ->where('quote_id', $quote->id)
            ->whereIn('quote_calculation_id', $quoteIds)
            ->where('approved', 1)
            ->sum('quote_total');
    }

    public function quoteSubmit()
    {
        $this->quote->title = $this->title;
        $this->quote->remarks = $this->remarks;
        if($this->quote){
            $this->quote->date = $this->date;
        }
        $this->quote->update();
    }

    public function deleteQuote()
    {
        // Delete all sub calculations for this quote
        $quoteSubCalculations = QuoteSubCalculation::where('quote_id', $this->quote->id)->get();
        foreach ($quoteSubCalculations as $subLine){
            $subLine->delete();
        }

        // Delete all calculations for this quote
        $quoteCalculations = QuoteCalculation::where('quote_id', $this->quote->id)->get();
        foreach ($quoteCalculations as $subLine){
            $subLine->delete();
        }

        // Delete all quote damages for this quote
        $quoteDamagIds = QuoteDamage::where('quote_id', $this->quote->id)->get();
        foreach ($quoteDamagIds as $subLine){
            $subLine->delete();
        }

        // Delete actual quote
        $quote = $this->quote;
        $quote->delete();

        return redirect()->route('situation.edit', [$this->inspection, $this->situation]);
    }

    public function toggleApproval($damageId)
    {
        $damage = QuoteDamage::find($damageId);

        if ($damage) {
            // Toggle the approval status
            $damage->approved = !$damage->approved;
            $damage->save();
        }
    }

    public function toggleSubCalculationApproval($subCalculationId)
    {
        $subCalculation = QuoteSubCalculation::find($subCalculationId);

        if ($subCalculation) {
            // Toggle the approval status
            $subCalculation->approved = !$subCalculation->approved;
            $subCalculation->save();
        }
    }

    public function createAgreement()
    {
        $agreement = new Agreement();

        $agreement->inspection_id = $this->inspection->id;
        $agreement->situation_id = $this->situation->id;
        $agreement->quote_id = $this->quote->id;
        $agreement->date = now();
        $agreement->title = 'Akkoord_schade_' . now();
        $agreement->pricing = 0;
        $agreement->save();

        $this->agreements = Agreement::query()
            ->where('inspection_id', $this->inspection->id)
            ->where('situation_id', $this->situation->id)
            ->where('quote_id', $this->quote->id)
            ->get();
    }

    public function render()
    {
        return view('livewire.quote.edit');
    }
}
