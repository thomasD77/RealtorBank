<?php

namespace App\Http\Livewire\Situation;

use App\Models\Address;
use App\Models\Calculation;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Damage;
use App\Models\DamagesSituation;
use App\Models\Inspection;
use App\Models\Owner;
use App\Models\Quote;
use App\Models\QuoteCalculation;
use App\Models\QuoteDamage;
use App\Models\QuoteSubCalculation;
use App\Models\RentalClaim;
use App\Models\Situation;
use App\Models\SubCalculation;
use App\Models\Tenant;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MediaSituation;
use App\Models\MediaStore;
use Livewire\WithPagination;

class Edit extends Component
{
    public Inspection $inspection;
    public Situation $situation;

    public Tenant $tenant;
    public Owner $owner;

    public $intrede;
    public $extra;
    public $contract;
    public $date;
    public $claim;

    public $name;
    public $email;
    public $phone;
    public $nameTenant;
    public $emailTenant;
    public $phoneTenant;

    public $currentAddress;
    public $currentZip;
    public $currentPostBus;
    public $currentCity;
    public $currentCountry;

    public $address;
    public $zip;
    public $postBus;
    public $city;
    public $country;

    public $client;
    public $general;

    public $addendum_check;

    public $media = [];
    public $files;

    public $folder = 'situations';
    public $relation_id = 'situation_id';
    public $mediaName = 'MediaSituation';

    public $pdfs;

    public $showArchived = false;

    public $last_intrede;

    public $quotes;

    use WithFileUploads;
    use WithPagination;

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(Inspection $inspection, Situation $situation)
    {
        $this->inspection = $inspection;
        $this->situation = $situation;
        $this->intrede = $this->situation->intrede;

        $this->extra = $this->situation->extra;
        $this->date = $this->situation->date;

        $this->name = $this->situation->owner->name;
        $this->email = $this->situation->owner->email;
        $this->phone = $this->situation->owner->phone;

        $this->nameTenant = $this->situation->tenant->name;
        $this->emailTenant = $this->situation->tenant->email;
        $this->phoneTenant = $this->situation->tenant->phone;

        if($this->situation->address){
            $this->address = $this->situation->address->address;
            $this->zip = $this->situation->address->zip;
            $this->postBus = $this->situation->address->postBus;
            $this->city = $this->situation->address->city;
            $this->country = $this->situation->address->country;
        }

        $this->client = $this->situation->client;
        $this->general = $this->situation->general;

        if($this->situation->tenant->address){
            $this->currentAddress = $this->situation->tenant->address->address;
            $this->currentZip = $this->situation->tenant->address->zip;
            $this->currentPostBus = $this->situation->tenant->address->postBus;
            $this->currentCity = $this->situation->tenant->address->city;
            $this->currentCountry = $this->situation->tenant->address->country;
        }

        $this->addendum_check = Situation::where('inspection_id', $this->inspection->id)
            ->where('intrede', 1)
            ->first();

        $this->contract = Contract::query()
            ->where('inspection_id', $inspection->id)
            ->where('situation_id', $situation->id)
            ->first();

        $this->claim = RentalClaim::query()
            ->where('inspection_id', $inspection->id)
            ->where('situation_id', $situation->id)
            ->first();

        $files = MediaSituation::where('situation_id', $this->situation->id)->get();
        $this->files = $files;

        $pdfs = \App\Models\PDF::query()
            ->where('inspection_id', $this->inspection->id)
            ->where('situation_id', $this->situation->id)
            ->latest()
            ->get();
        $this->pdfs = $pdfs;

        // Get the latest INTREDE
        $last_intrede = Situation::query()
            ->where('intrede', 1)
            ->where('inspection_id', $inspection->id)
            ->orderBy('date', 'desc')
            ->first();

        $this->last_intrede = $last_intrede;

        $this->quotes = Quote::where('situation_id', $this->situation->id)->get();
    }

    public function deletePDF($pdf)
    {
        $pdf = \App\Models\PDF::find($pdf);
        File::delete('assets/inspections/pdf/' . $pdf->file_original);
        $pdf->delete();

        //Render
        $pdfs = \App\Models\PDF::query()
            ->where('inspection_id', $this->inspection->id)
            ->where('situation_id', $this->situation->id)
            ->latest()
            ->get();
        $this->pdfs = $pdfs;
    }

    public function intredeSubmit($value)
    {
        $this->situation->intrede = $value;
        $this->situation->date = $this->date;
        $this->situation->update();
        $this->intrede = $this->situation->intrede;
    }

    public function ownerSubmit()
    {
        $owner = Owner::find($this->situation->owner->id);
        $owner->name = $this->name;
        $owner->email = $this->email;
        $owner->phone = $this->phone;
        $owner->update();
        session()->flash('successOwner', 'success!');
    }

    public function tenantSubmit()
    {
        $tenant = Tenant::find($this->situation->tenant->id);
        $tenant->name = $this->nameTenant;
        $tenant->email = $this->emailTenant;
        $tenant->phone = $this->phoneTenant;
        $tenant->update();
        session()->flash('successTenant', 'success!');
    }

    public function addressSubmit()
    {
        $tenant = Tenant::find($this->situation->tenant->id);

        if(!$tenant->address){
            $address = new Address();
        }else {
            $address = Address::where('tenant_id', $tenant->id)->first();
        }

        $address->address = $this->currentAddress;
        $address->zip = $this->currentZip;
        $address->postBus = $this->currentPostBus;
        $address->city = $this->currentCity;
        $address->country = $this->currentCountry;
        $address->tenant_id = $tenant->id;
        $address->save();
        session()->flash('successAddress', 'success!');
    }

    public function editDate()
    {
        $this->situation->date = $this->date;
        if($this->date){
            $this->situation->update();
        }
    }

    public function extraSubmit()
    {
        $this->situation->extra = $this->extra;
        $this->situation->update();
        $this->extra = $this->situation->extra;
        session()->flash('successExtra', 'success!');
    }

    public function startWorkSubmit()
    {
        $this->situation->general = $this->general;


        session()->flash('successStartWork', 'success!');
    }

    public function locationStartWorkerSubmit()
    {
        $this->situation->client = $this->client;
        $this->situation->update();

        $address = Address::where('situation_id', $this->situation->id)->first();

        if(!$address){
            $address = new Address();
        }else {
            $address = Address::where('situation_id', $this->situation->id)->first();
        }

        $address->address = $this->address;
        $address->zip = $this->zip;
        $address->postBus = $this->postBus;
        $address->city = $this->city;
        $address->country = $this->country;
        $address->situation_id = $this->situation->id;
        $address->save();
        session()->flash('successStartWorkerAddress', 'success!');
    }

    public function deleteSituation()
    {
        $damages = $this->situation->damages()->where('situation_id', $this->situation->id)->get();
        foreach ($damages as $damage){
            $this->situation->damages()->detach($damage->id);
        }

        $situation = $this->situation;
        $situation->delete();


        return redirect()->route('situation.index', $this->inspection);
    }

    public function saveMedia()
    {
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaSituation();

        //Save and store
        if( $this->media != [] && $this->media != "") {
            (new \App\Models\MediaStore)->createAndStoreMedia($this->mediaName, $mediaStore, $this->inspection, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaSituation::where('situation_id', $this->situation->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaSituation::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaSituation::where('situation_id', $this->situation->id)->get();
    }

    public function togglePdfPrint(Damage $damage)
    {
        $pivotRecord = $this->situation->damages()->where('damage_id', $damage->id)->first();

        if ($pivotRecord) {
            $this->situation->damages()->detach($damage->id);
        } else {
            $this->situation->damages()->attach($damage->id, [
                'print_pdf' => 1,
                'archived' => 0
            ]);
        }

        $this->situation->refresh();
    }

    public function archive(Damage $damage)
    {
        $pivotRecord = $this->situation->damages()->where('damage_id', $damage->id)->first();

        if ($pivotRecord && $pivotRecord->pivot->print_pdf) {

            $this->situation->damages()->updateExistingPivot($damage->id, [
                'print_pdf' => 0,
                'archived' => 1
            ]);

        } elseif($pivotRecord && !$pivotRecord->pivot->print_pdf) {

            $this->situation->damages()->detach($damage->id);

        } else {

            $this->situation->damages()->attach($damage->id, [
                'print_pdf' => 0,
                'archived' => 1
            ]);
        }
    }

    public function toggleArchived()
    {
        $this->showArchived = !$this->showArchived;
    }

    public function addQuote()
    {
        // First create new quote
        $quote = new Quote();
        $quote->inspection_id = $this->inspection->id;
        $quote->situation_id = $this->situation->id;
        $quote->title = 'Default';
        $quote->date = today();
        $quote->save();

        // Print damage on quote
        $damageIds = DamagesSituation::query()
            ->where('situation_id', $this->situation->id)
            ->where('print_pdf', 1)
            ->pluck('damage_id');

        $damages = Damage::whereIn('id', $damageIds)->get();

        if(!$damages){
            return;
        }

        foreach ($damages as $damage){
            $quoteDamage = new QuoteDamage();

            $quoteDamage->quote_id = $quote->id;
            $quoteDamage->damage_id = $damage->id;

            $quoteDamage->inspection_id = $damage->inspection_id;
            $quoteDamage->basic_id = $damage->basic_id;
            $quoteDamage->specific_id = $damage->specific_id;
            $quoteDamage->conform_id = $damage->conform_id;
            $quoteDamage->general_id = $damage->general_id;
            $quoteDamage->technique_id = $damage->technique_id;
            $quoteDamage->outdoor_id = $damage->outdoor_id;

            $quoteDamage->damage_title = $damage->title;
            $quoteDamage->damage_date = $damage->date;
            $quoteDamage->damage_description = $damage->description;
            $quoteDamage->damage_print_pdf = $damage->print_pdf;
            $quoteDamage->save();
        }

        // Print all the existing calculations with the quote damages
        $calculations = Calculation::query()
            ->whereIn('damage_id', $damageIds)
            ->where('inspection_id', $this->inspection->id)
            ->get();

        if(!$calculations){
         return;
        }

        foreach ($calculations as $calculation){
            $quoteCalculation = new QuoteCalculation();

            $quoteCalculation->inspection_id = $calculation->inspection_id;
            $quoteCalculation->quote_cal_id = $calculation->id;
            $quoteCalculation->quote_damage_id = $calculation->damage_id;
            $quoteCalculation->quote_id = $quote->id;
            $quoteCalculation->quote_brutto_total = $calculation->brutto_total;
            $quoteCalculation->quote_vetustate = $calculation->vetustate;
            $quoteCalculation->quote_vetustate_amount = $calculation->vetustate_amount;
            $quoteCalculation->quote_final_total = $calculation->final_total;
            $quoteCalculation->save();
        }

        // Print all the existing sub-calculations with quote
        $calculationIds = Calculation::query()
            ->whereIn('damage_id', $damageIds)
            ->where('inspection_id', $this->inspection->id)
            ->pluck('id');

        $SubCalculations = SubCalculation::query()
            ->whereIn('calculation_id', $calculationIds)
            ->get();

        if(!$SubCalculations){
            return;
        }

        foreach ($SubCalculations as $subCalculation){
            $quoteSubCalculation = new QuoteSubCalculation();

            $quoteSubCalculation->quote_calculation_id = $subCalculation->calculation_id;
            $quoteSubCalculation->category_pricing_id = $subCalculation->category_pricing_id;
            $quoteSubCalculation->sub_category_pricing_id = $subCalculation->sub_category_pricing_id;
            $quoteSubCalculation->quote_id = $quote->id;

            $quoteSubCalculation->quote_description = $subCalculation->description;
            $quoteSubCalculation->quote_cost_square_meter = $subCalculation->cost_square_meter;
            $quoteSubCalculation->quote_cost_hour = $subCalculation->cost_hour;
            $quoteSubCalculation->quote_cost_piece = $subCalculation->cost_piece;
            $quoteSubCalculation->quote_count = $subCalculation->count;
            $quoteSubCalculation->quote_total = $subCalculation->total;
            $quoteSubCalculation->quote_tax = $subCalculation->tax;
            $quoteSubCalculation->save();
        }

        $this->quotes = Quote::where('situation_id', $this->situation->id)->get();
    }

    public function render()
    {
        // First get the right damages (ID)
        $damageIds = Damage::query()
            ->where('inspection_id', $this->inspection->id)
            ->pluck('id');

        $pivotArchivedIds = DamagesSituation::where('archived', 1)
            ->where('situation_id', $this->situation->id)
            ->whereIn('damage_id', $damageIds)
            ->pluck('damage_id');

        // Get all the damages from the pivot table that are archived
        if ($this->showArchived) {
            // Get al the damages again, but now we have filtered for archived
            $damages = Damage::query()
                ->where('inspection_id', $this->inspection->id)
                ->whereIn('id', $pivotArchivedIds)
                ->orderBy('date', 'desc')
                ->simplePaginate(10);

        } else {
            $damages = Damage::query()
                ->where('inspection_id', $this->inspection->id)
                ->whereNotIn('id', $pivotArchivedIds)
                ->orderBy('date', 'desc')
                ->simplePaginate(10);
        }

        return view('livewire.situation.edit', [
            'damages' => $damages
        ]);
    }

}
