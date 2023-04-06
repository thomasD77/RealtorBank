<?php

namespace App\Http\Livewire\General\Elements;

use App\Models\General;
use App\Models\MediaGeneral;
use App\Models\MediaInspection;
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
    public $mediaName = 'MediaGeneral';

    use WithFileUploads;

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(General $general)
    {
        $this->general = $general;
        $this->files = MediaGeneral::where($this->relation_id, $this->general->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaGeneral;

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($this->mediaName, $mediaStore, $this->general, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaGeneral::where($this->relation_id, $this->general->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaGeneral::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaGeneral::where($this->relation_id, $this->general->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
