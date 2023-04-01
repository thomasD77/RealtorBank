<?php

namespace App\Http\Livewire\Media;

use App\Models\BasicArea;
use App\Models\MediaBasic;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Livewire\Component;

class Rotate extends Component
{
    public $mediaStore;
    public BasicArea $basicArea;
    public $folder = 'basic';
    public $relation_id = 'basic_id';

    public function mount($file, BasicArea $basicArea){
        $this->mediaStore = MediaBasic::find($file->id);
        $this->basicArea = $basicArea;
    }

    public function rotateMedia()
    {
        //Do the work
        $img = Image::make(public_path('/assets/images/' . $this->folder . '/' . $this->mediaStore->file_original));
        $img->rotate(90);

        //Delete original files
        File::delete('assets/images/' . $this->folder . '/' . $this->mediaStore->file_original);
        File::delete('assets/images/' . $this->folder . '/crop/' . $this->mediaStore->file_crop);

        $img->save(public_path('/assets/images/' . $this->folder . '/' . $this->mediaStore->file_original));
        $img->save(public_path('/assets/images/' . $this->folder . '/crop/' . $this->mediaStore->file_crop));

        $files = MediaBasic::where($this->relation_id, $this->basicArea->id)->get();

        $this->emit('renderMedia');
    }

    public function render()
    {
        return view('livewire.media.rotate');
    }
}
