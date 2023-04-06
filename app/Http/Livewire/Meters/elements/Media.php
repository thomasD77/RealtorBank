<?php

namespace App\Http\Livewire\Meters\Elements;

use App\Models\Key;
use App\Models\MediaMeter;
use App\Models\MediaStore;
use App\Models\Meter;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    public Key $key;

    public $media = [];
    public $files;
    public $folder = 'meters';
    public $relation_id = 'meter_id';
    public $mediaName = 'MediaMeter';

    use WithFileUploads;

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(Meter $dynamicArea)
    {
        $this->meter = $dynamicArea;
        $this->files = MediaMeter::where($this->relation_id, $this->meter->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaMeter();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($this->mediaName, $mediaStore, $this->meter, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaMeter::where($this->relation_id, $this->meter->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaMeter::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaMeter::where($this->relation_id, $this->meter->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
