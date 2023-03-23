<?php

namespace App\Http\Livewire\company;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyAddress extends Component
{
    public Address $address;

    public $addressInput;
    public $zip;
    public $postBus;
    public $city;
    public $country;

    public function mount()
    {
        //
        $current_address = Address::where('company_id', Auth()->user()->company_id)->first();
        if($current_address){
            $this->addressInput = $current_address->address;
            $this->zip = $current_address->zip;
            $this->postBus = $current_address->postBus;
            $this->city = $current_address->city;
            $this->country = $current_address->country;
        }
    }

    public function addressSubmit()
    {
        if(Auth()->user()->company_id){
            $this->address = Address::where('company_id', Auth()->user()->company_id)->first();
            $this->address->address = $this->addressInput;
            $this->address->postBus = $this->postBus;
            $this->address->zip = $this->zip;
            $this->address->city = $this->city;
            $this->address->country = $this->country;
            $this->address->update();
            session()->flash('success', 'success!');

        }else {
            $address = new Address();

            $address->address = $this->addressInput;
            $address->postBus = $this->postBus;
            $address->zip = $this->zip;
            $address->city = $this->city;
            $address->country = $this->country;
            $address->company = Auth()->user()->company_id;
            $address->save();
            session()->flash('success', 'success!');
        }
    }


    public function render()
    {
        return view('livewire.company.company-address');
    }
}
