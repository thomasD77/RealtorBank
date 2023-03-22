<?php

namespace App\Http\Livewire\Profile;

use App\Models\Address;
use Livewire\Component;

class ProfileAddress extends Component
{
    public Address $address;

    public function mount()
    {
        //
    }

    public function addressSubmit()
    {
        if(Auth()->user()->address){
            dd('update');
        }else {
            dd('create');
        }
    }

    public function render()
    {
        return view('livewire.profile.profile-address');
    }
}
