<?php

namespace App\Http\Livewire\Profile;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileAddress extends Component
{
    public Address $address;

    public $addressInput;
    public $zip;
    public $postBus;
    public $city;
    public $country;

    protected $rules = [
        'addressInput' => 'max:30',
        'zip' => 'max:10',
        'postBus' => 'max:30',
        'city' => 'max:30',
        'country' => 'max:30',
    ];


    public function mount()
    {
        //
        $current_address = Address::where('user_id', Auth::id())->first();
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
        $this->validate();

        if(Auth()->user()->address){
             $this->address = Auth()->user()->address;
             $this->address->address = $this->addressInput;
             $this->address->postBus = $this->postBus;
             $this->address->zip = $this->zip;
             $this->address->city = $this->city;
             $this->address->country = $this->country;
             $this->address->update();
             session()->flash('successAddress', 'success!');

        }else {
            $address = new Address();

            $address->address = $this->addressInput;
            $address->postBus = $this->postBus;
            $address->zip = $this->zip;
            $address->city = $this->city;
            $address->country = $this->country;
            $address->user_id = Auth::id();
            $address->save();
            session()->flash('success', 'success!');
        }
    }

    public function render()
    {
        return view('livewire.profile.profile-address');
    }
}
