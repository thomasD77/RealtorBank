<?php

namespace App\Http\Livewire\Inspection;

use App\Models\Inspection;
use Livewire\Component;

class Edit extends Component
{
    public Inspection $inspection;
    public $title;
    public $address;
    public $postBus;
    public $zip;
    public $city;
    public $country;

    public $tenant_present;
    public $owner_present;
    public $new_building;
    public $inhabited;
    public $furnished;
    public $first_resident;

    public $description;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->title = $inspection->title;
        $this->description = $inspection->extra;
        $this->address = $inspection->address;
        $this->postBus = $inspection->postBus;
        $this->zip = $inspection->zip;
        $this->city = $inspection->city;
        $this->country = $inspection->country;

        $this->tenant_present = $inspection->tenant_present;
        $this->owner_present = $inspection->owner_present;
        $this->new_building = $inspection->new_building;
        $this->inhabited = $inspection->inhabited;
        $this->furnished = $inspection->furnished;
        $this->first_resident = $inspection->first_resident;
    }

    public function submitGeneral()
    {
        $this->inspection->title = $this->title;
        $this->inspection->extra = $this->description;
        $this->inspection->update();
        session()->flash('success', 'success!');
    }

    public function locationSubmit()
    {
        $this->inspection->address = $this->address;
        $this->inspection->postBus = $this->postBus;
        $this->inspection->zip = $this->zip;
        $this->inspection->city = $this->city;
        $this->inspection->country = $this->country;
        $this->inspection->update();
        session()->flash('success', 'success!');
    }

    public function present($value)
    {
        if(!$this->inspection->$value){
            $this->inspection->$value = 'ja';
        }else {
            $this->inspection->$value = null;
        }
        $this->inspection->update();
    }





    public function render()
    {
        return view('livewire.inspection.edit');
    }
}
