<?php

namespace App\Http\Livewire\Basic\Elements;


use App\Models\BasicArea;
use App\Models\MediaBasic;
use App\Models\MediaStore;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    public BasicArea $basicArea;

    public $media = [];
    public $files;
    public $folder = 'basic';
    public $relation_id = 'basic_id';

    use WithFileUploads;

    protected $listeners = ['renderMedia' => '$refresh'];

    protected $messages = [
        'media.*' => 'Oeps, bestand mag niet groter zijn dan 202 MB.',
    ];

    public function mount(BasicArea $basicArea)
    {
        $this->basicArea = $basicArea;
        $this->files = MediaBasic::where($this->relation_id, $this->basicArea->id)->get();
    }

    public function renderMedia($files)
    {
        //
    }

    public function saveMedia()
    {
        //Validate
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:2024',
        ]);

        //Set up model
        $mediaStore = new MediaBasic();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            MediaStore::createAndStoreMedia($mediaStore, $this->basicArea, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaBasic::where($this->relation_id, $this->basicArea->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaBasic::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaBasic::where($this->relation_id, $this->basicArea->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
