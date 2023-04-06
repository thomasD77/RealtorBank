<?php

namespace App\Http\Livewire\Technique\Elements;

use App\Models\MediaStore;
use App\Models\MediaTechnique;
use App\Models\techniqueArea;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    public TechniqueArea $techniqueArea;

    public $media = [];
    public $files;
    public $folder = 'technique';
    public $relation_id = 'technique_id';
    public $mediaName = 'MediaTechnique';

    use WithFileUploads;

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(TechniqueArea $techniqueArea)
    {
        $this->techniqueArea = $techniqueArea;
        $this->files = MediaTechnique::where($this->relation_id, $this->techniqueArea->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaTechnique();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($this->mediaName, $mediaStore, $this->techniqueArea, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaTechnique::where($this->relation_id, $this->techniqueArea->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaTechnique::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaTechnique::where($this->relation_id, $this->techniqueArea->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
