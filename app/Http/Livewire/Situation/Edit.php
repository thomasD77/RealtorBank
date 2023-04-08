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

        $this->name = $this->situation->owner->name;
        $this->email = $this->situation->owner->email;
        $this->phone = $this->situation->owner->phone;

        $this->nameTenant = $this->situation->tenant->name;
        $this->emailTenant = $this->situation->tenant->email;
        $this->phoneTenant = $this->situation->tenant->phone;

        if($this->situation->tenant->address){
            $this->currentAddress = $this->situation->tenant->address->address;
            $this->currentZip = $this->situation->tenant->address->zip;
            $this->currentPostBus = $this->situation->tenant->address->postBus;
            $this->currentCity = $this->situation->tenant->address->city;
            $this->currentCountry = $this->situation->tenant->address->country;
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

    public function deleteSituation()
    {
        $situation = $this->situation;
        $situation->delete();

        return redirect()->route('situation.index', $this->inspection);
    }

}
