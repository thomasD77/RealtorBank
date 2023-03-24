<?php

namespace App\Http\Livewire\Situation;

use App\Models\Address;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Inspection;
use App\Models\Owner;
use App\Models\Situation;
use App\Models\Tenant;
use Livewire\Component;

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


    public function mount(Inspection $inspection, Situation $situation)
    {
        $this->inspection = $inspection;
        $this->situation = $situation;
        $this->intrede = $this->situation->intrede;

        $this->extra = $this->situation->extra;
        $this->date = $this->situation->date;

        if($this->situation->owner){
            $this->owner = $this->situation->owner;
            $this->name = $this->situation->owner->name;
            $this->email = $this->situation->owner->email;
            $this->phone = $this->situation->owner->phone;
        }

        if($this->situation->tenant){
            $this->tenant = $this->situation->tenant;
            $this->nameTenant = $this->situation->tenant->name;
            $this->emailTenant = $this->situation->tenant->email;
            $this->phoneTenant = $this->situation->tenant->phone;
        }

        $this->contract = Contract::query()
            ->where('inspection_id', $inspection->id)
            ->where('situation_id', $situation->id)
            ->first();
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
        if($this->situation->owner){
           $owner = $this->situation->owner;
        }else {
            $owner = new Owner();
        }

        $owner->name = $this->name;
        $owner->email = $this->email;
        $owner->phone = $this->phone;
        $owner->save();

        $this->situation->owner_id = $owner->id;
        $this->situation->update();

        session()->flash('successOwner', 'success!');
    }

    public function addressSubmit()
    {
        if($this->intrede){
            $address = Address::where('tenant_id', $this->tenant->id)->whereNull('tenant_future_address')->first();
        }else {
            $address = Address::where('tenant_id', $this->tenant->id)->where('tenant_future_address', 1)->first();
        }

        if(!$address){
            $address = new Address();
        }

        $address->address = $this->currentAddress;
        $address->zip = $this->currentZip;
        $address->postBus = $this->currentPostBus;
        $address->city = $this->currentCity;
        $address->country = $this->currentCountry;
        $address->save();
        session()->flash('successAddress', 'success!');
    }

    public function editDate()
    {
        $this->situation->date = $this->date;
        $this->situation->update();
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
