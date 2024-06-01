<?php

namespace App\Http\Livewire\Profile;

use App\Models\Inspection;
use App\Models\MediaProfiles;
use App\Models\MediaStore;
use Livewire\Component;
use Livewire\WithFileUploads;

class Logo extends Component
{
    use WithFileUploads;

    public $media = [];
    public $files;

    public $folder = 'logos';
    public $relation_id = 'user_id';
    public $mediaName = 'MediaProfiles';

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount()
    {
        $files = MediaProfiles::where('user_id', Auth()->user()->id)->get();
        $this->files = $files;
    }

    public function saveMedia()
    {
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaProfiles();

        // We need to send an inspection, not really relevant here but take a random one from this user.
        $inspection = Inspection::where('user_id', Auth()->user()->id)->first();

        //Save and store
        if( $this->media != [] && $this->media != "") {
            (new \App\Models\MediaStore)->createAndStoreMedia($this->mediaName, $mediaStore, $inspection, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaProfiles::where('user_id', Auth()->user()->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaProfiles::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaProfiles::where('user_id', Auth()->user()->id)->get();
    }



    public function render()
    {
        return view('livewire.profile.logo');
    }
}
