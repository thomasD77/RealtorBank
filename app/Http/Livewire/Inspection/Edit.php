<?php

namespace App\Http\Livewire\Inspection;

use App\Enums\FloorKey;
use App\Models\Address;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\MediaInspection;
use App\Models\MediaStore;
use App\Models\Owner;
use App\Models\Room;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Inspection $inspection;
    public Address $address;

    public $title;
    public $description;

    public $tenant_present;
    public $owner_present;
    public $new_building;
    public $inhabited;
    public $furnished;
    public $first_resident;

    public $name;
    public $email;
    public $phone;
    public $addressInput;
    public $postBus;
    public $zip;
    public $city;
    public $country;
    public $date;

    public $media = [];
    public $files;

    public $folder = 'inspections';
    public $relation_id = 'inspection_id';
    public $mediaName = 'MediaInspection';

    public $groundFloorParam;
    public $upperFloorParam;

    public $maxGround;
    public $maxUpper;
    public $minUpper;

    use WithFileUploads;

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->title = $inspection->title;
        $this->description = $inspection->extra;
        $this->date = $inspection->date;

        $this->tenant_present = $inspection->tenant_present;
        $this->owner_present = $inspection->owner_present;
        $this->new_building = $inspection->new_building;
        $this->inhabited = $inspection->inhabited;
        $this->furnished = $inspection->furnished;
        $this->first_resident = $inspection->first_resident;

        $address = Address::where('inspection_id', $this->inspection->id)->first();

        $this->address = $address;
        $this->addressInput = $address->address;
        $this->postBus = $address->postBus;
        $this->zip = $address->zip;
        $this->city = $address->city;
        $this->country = $address->country;

        $files = MediaInspection::where('inspection_id', $this->inspection->id)->get();
        $this->files = $files;
    }

    public function submitGeneral()
    {
        $this->inspection->title = $this->title;
        if($this->date){
            $this->inspection->date = $this->date;
        }else {
            $this->inspection->date = null;
        }
        $this->inspection->extra = $this->description;
        $this->inspection->update();
        session()->flash('successGeneral', 'success!');
    }

    public function locationSubmit()
    {
        $this->address->address = $this->addressInput;
        $this->address->postBus = $this->postBus;
        $this->address->zip = $this->zip;
        $this->address->city = $this->city;
        $this->address->country = $this->country;
        $this->address->update();
        session()->flash('successAddress', 'success!');
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

    public function saveMedia()
    {
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaInspection();

        //Save and store
        if( $this->media != [] && $this->media != "") {
            (new \App\Models\MediaStore)->createAndStoreMedia($this->mediaName, $mediaStore, $this->inspection, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaInspection::where('inspection_id', $this->inspection->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaInspection::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaInspection::where('inspection_id', $this->inspection->id)->get();
    }

    public function deleteInspection()
    {
        $situation = $this->inspection;
        $situation->delete();

        return redirect()->route('inspections.index');
    }

    public function render()
    {
        return view('livewire.inspection.edit');
    }

}
