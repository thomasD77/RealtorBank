<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Inspection;
use App\Models\Invoice;
use App\Models\InvoiceDamage;
use App\Models\Situation;
use Livewire\Component;

class Edit extends Component
{
    public Inspection $inspection;
    public Situation $situation;
    public Invoice $invoice;

    public $title;
    public $date;
    public $remarks;

    public $invoiceDamages;

    public function mount(Inspection $inspection, Situation $situation, Invoice $invoice)
    {
        $this->inspection = $inspection;
        $this->situation = $situation;
        $this->invoice = $invoice;

        $this->title = $this->invoice->title;
        $this->date = $this->invoice->date;
        $this->remarks = $this->invoice->remarks;

        $this->invoiceDamages = InvoiceDamage::query()
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
            ->where('invoice_id', $this->invoice->id)
            ->where('inspection_id', $this->inspection->id)
            ->where('damage_print_pdf', 1)
            ->get();
    }


    public function invoiceSubmit()
    {
        $this->invoice->title = $this->title;
        $this->invoice->remarks = $this->remarks;
        if($this->invoice){
            $this->invoice->date = $this->date;
        }
        $this->invoice->update();
        session()->flash('success', 'success!');
    }

    public function deleteInvoice()
    {
        $invoice = $this->invoice;
        $invoice->delete();

        session()->flash('successDeleteInvoice', 'Offerte werd verwijderd!');

        return redirect()->route('situation.edit', [$this->inspection, $this->situation]);
    }

    public function render()
    {
        return view('livewire.invoice.edit');
    }
}
