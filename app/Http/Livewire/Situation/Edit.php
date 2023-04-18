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
use Livewire\WithFileUploads;
use App\Models\MediaSituation;
use App\Models\MediaStore;

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

    public $address;
    public $zip;
    public $postBus;
    public $city;
    public $country;

    public $client;
    public $general;

    public $media = [];
    public $files;

    public $folder = 'situations';
    public $relation_id = 'situation_id';
    public $mediaName = 'MediaSituation';

    use WithFileUploads;

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

        $this->address = $this->situation->address->address;
        $this->zip = $this->situation->address->zip;
        $this->postBus = $this->situation->address->postBus;
        $this->city = $this->situation->address->city;
        $this->country = $this->situation->address->country;

        $this->client = $this->situation->client;
        $this->general = $this->situation->general;

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

        $files = MediaSituation::where('situation_id', $this->situation->id)->get();
        $this->files = $files;
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
        $this->situation->client = $this->client;
        $this->situation->update();
        session()->flash('successStartWork', 'success!');
    }

    public function locationStartWorkerSubmit()
    {
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

}
