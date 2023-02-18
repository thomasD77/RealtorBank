<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Models\ConformArea;
use App\Models\MediaConform;
use App\Models\MediaStore;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    public ConformArea $conformArea;

    public $media = [];
    public $files;
    public $folder = 'conform';
    public $relation_id = 'conform_id';

    use WithFileUploads;

    public function mount(ConformArea $conformArea)
    {
        $this->conformArea = $conformArea;
        $this->files = MediaConform::where($this->relation_id, $this->conformArea->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->validate([
            'media.*' => 'image|max:2024',
        ]);

        //Set up model
        $mediaStore = new MediaConform();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($mediaStore, $this->conformArea, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaConform::where($this->relation_id, $this->conformArea->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaConform::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaConform::where($this->relation_id, $this->conformArea->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
