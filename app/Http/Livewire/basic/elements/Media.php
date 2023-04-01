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

    protected $messages = [
        'media.*' => 'Oeps, bestand mag niet groter zijn dan 202 MB.',
    ];

    public function mount(BasicArea $basicArea)
    {
        $this->basicArea = $basicArea;
        $this->files = MediaBasic::where($this->relation_id, $this->basicArea->id)->get();
    }

    public function saveMedia()
    {
        //Validate
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:22024',
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

    public function rotateMedia($file)
    {
        $mediaStore = MediaBasic::find($file);
        //Do the work
        $img = Image::make(public_path('/assets/images/' . $this->folder . '/' . $mediaStore->file_original));
        $img->rotate(90);

        //Delete original files
        File::delete('assets/images/' . $this->folder . '/' . $mediaStore->file_original);
        File::delete('assets/images/' . $this->folder . '/crop/' . $mediaStore->file_crop);

        $img->save(public_path('/assets/images/' . $this->folder . '/' . $mediaStore->file_original));
        $img->save(public_path('/assets/images/' . $this->folder . '/crop/' . $mediaStore->file_crop));

        $files = MediaBasic::where($this->relation_id, $this->basicArea->id)->get();

        $this->emit('renderMedia');
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaBasic::find($file);
        
        if($mediaStore){
            MediaStore::deleteMedia($mediaStore, $this->folder);
        }
        //Render
        $this->files = MediaBasic::where($this->relation_id, $this->basicArea->id)->get();
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
