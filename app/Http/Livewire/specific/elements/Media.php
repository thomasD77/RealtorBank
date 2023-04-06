<?php

namespace App\Http\Livewire\Specific\Elements;

use App\Models\MediaSpecific;
use App\Models\MediaStore;
use App\Models\SpecificArea;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    public SpecificArea $specificArea;

    public $media = [];
    public $files;
    public $folder = 'specific';
    public $relation_id = 'specific_id';
    public $mediaName = 'MediaSpecific';

    use WithFileUploads;

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(SpecificArea $specificArea)
    {
        $this->specificArea = $specificArea;
        $this->files = MediaSpecific::where($this->relation_id, $this->specificArea->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaSpecific();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            (new \App\Models\MediaStore)->createAndStoreMedia($this->mediaName, $mediaStore, $this->specificArea, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaSpecific::where($this->relation_id, $this->specificArea->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaSpecific::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaSpecific::where($this->relation_id, $this->specificArea->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
