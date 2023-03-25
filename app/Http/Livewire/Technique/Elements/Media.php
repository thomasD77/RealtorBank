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

    use WithFileUploads;

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
            'media.*' => 'image|max:2024',
        ]);

        //Set up model
        $mediaStore = new MediaTechnique();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($mediaStore, $this->techniqueArea, $this->media, $this->folder, $this->relation_id);
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
