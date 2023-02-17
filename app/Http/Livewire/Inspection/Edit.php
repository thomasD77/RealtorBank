<?php

namespace App\Http\Livewire\Inspection;

use App\Models\Inspection;
use App\Models\MediaInspection;
use App\Models\Owner;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Inspection $inspection;
    public Owner $owner;

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
    public $address;
    public $postBus;
    public $zip;
    public $city;
    public $country;

    public $media;
    public $files;
    public $file_name;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->title = $inspection->title;
        $this->description = $inspection->extra;

        $this->tenant_present = $inspection->tenant_present;
        $this->owner_present = $inspection->owner_present;
        $this->new_building = $inspection->new_building;
        $this->inhabited = $inspection->inhabited;
        $this->furnished = $inspection->furnished;
        $this->first_resident = $inspection->first_resident;

        $owner = Owner::find($this->inspection->id);

        $this->owner = $owner;
        $this->postBus = $owner->postBus;
        $this->address = $owner->address;
        $this->zip = $owner->zip;
        $this->city = $owner->city;
        $this->country = $owner->country;
        $this->name = $owner->name;
        $this->email = $owner->email;
        $this->phone = $owner->phone;

        $files = MediaInspection::where('inspection_id', $this->inspection->id)->get();
        $this->files = $files;
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
        $this->owner->name = $this->name;
        $this->owner->email = $this->email;
        $this->owner->phone = $this->phone;
        $this->owner->address = $this->address;
        $this->owner->postBus = $this->postBus;
        $this->owner->zip = $this->zip;
        $this->owner->city = $this->city;
        $this->owner->country = $this->country;
        $this->owner->update();
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

    public function saveMedia()
    {
        $this->validate([
            'media' => 'image|max:1024', // 1MB Max
        ]);

        $mediaStore = new MediaInspection();
        $mediaStore->inspection_id = $this->inspection->id;

        //Save original image
        $name = time(). $this->media->getClientOriginalName();
        $media = $this->media->storeAs('assets/images/inspections', $name);
        $mediaStore->file_original = $name;

        //Save crop version image
        $crop = time(). $this->media->getClientOriginalName();
        $imgCrop = Image::make($media);
        $imgCrop->crop(550, 350)->save(public_path('assets/images/inspections/crop').'/'.$crop);
        $mediaStore->file_crop = $crop;

        $mediaStore->save();

        $files = MediaInspection::where('inspection_id', $this->inspection->id)->get();
        $this->files = $files;
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        $mediaStore = MediaInspection::find($file);
        File::delete('assets/images/inspections/' . $mediaStore->file_original);
        File::delete('assets/images/inspections/crop/' . $mediaStore->file_crop);
        $mediaStore->delete();

        $files = MediaInspection::where('inspection_id', $this->inspection->id)->get();
        $this->files = $files;
    }

    public function render()
    {
        return view('livewire.inspection.edit');
    }

}
