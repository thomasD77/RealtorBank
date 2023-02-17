<?php

namespace App\Http\Livewire\General\Elements;

use App\Models\General;
use App\Models\MediaGeneral;
use App\Models\MediaInspection;
use App\Models\MediaRoom;
use App\Models\MediaStore;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    public General $general;

    public $media = [];
    public $files;
    public $folder = 'general';
    public $relation_id = 'general_id';

    use WithFileUploads;

    public function mount(General $general)
    {
        $this->general = $general;
        $this->files = MediaGeneral::where('general_id', $this->general->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->validate([
            'media.*' => 'image|max:1024',
        ]);

        //Set up model
        $mediaStore = new MediaGeneral;

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($mediaStore, $this->general, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaGeneral::where('general_id', $this->general->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaGeneral::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaGeneral::where('general_id', $this->general->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
