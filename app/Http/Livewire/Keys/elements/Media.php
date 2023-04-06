<?php

namespace App\Http\Livewire\Keys\Elements;

use App\Models\Key;
use App\Models\MediaBasic;
use App\Models\MediaKey;
use App\Models\MediaStore;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    public Key $key;

    public $media = [];
    public $files;
    public $folder = 'keys';
    public $relation_id = 'key_id';
    public $mediaName = 'MediaKey';


    use WithFileUploads;

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(Key $dynamicArea)
    {
        $this->key = $dynamicArea;
        $this->files = MediaKey::where($this->relation_id, $this->key->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaKey();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($this->mediaName, $mediaStore, $this->key, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaKey::where($this->relation_id, $this->key->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaKey::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaKey::where($this->relation_id, $this->key->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
