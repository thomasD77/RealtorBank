<?php

namespace App\Http\Livewire\Inspection;

use App\Models\Inspection;
use App\Models\MediaInspection;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

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
    public $media;
    public $files;

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

    public function saveMedia()
    {
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

}
