<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Models\MediaOutdoor;
use App\Models\MediaStore;
use App\Models\OutdoorArea;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    public OutdoorArea $outdoorArea;

    public $media = [];
    public $files;
    public $folder = 'outdoor';
    public $relation_id = 'outdoor_id';

    use WithFileUploads;

    public function mount(OutdoorArea $outdoorArea)
    {
        $this->outdoorArea = $outdoorArea;
        $this->files = MediaOutdoor::where($this->relation_id, $this->outdoorArea->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->validate([
            'media.*' => 'image|max:2024',
        ]);

        //Set up model
        $mediaStore = new MediaOutdoor();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($mediaStore, $this->outdoorArea, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaOutdoor::where($this->relation_id, $this->outdoorArea->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaOutdoor::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaOutdoor::where($this->relation_id, $this->outdoorArea->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
