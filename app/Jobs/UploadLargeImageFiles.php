<?php

namespace App\Jobs;

use App\Models\MediaStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;
use Maestroerror\HeicToJpg;

class UploadLargeImageFiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mediaStore;
    public $template;
    public $mediaItems;
    public $relation_id;
    public $folder;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mediaStore, $template, $mediaItems, $folder, $relation_id)
    {
        //
        $this->mediaItems = $mediaItems;
        $this->mediaStore = $mediaStore;
        $this->template = $template;
        $this->folder = $folder;
        $this->relation_id = $relation_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $thisModel = new MediaStore();

        foreach ($this->mediaItems as $media ){

            $mediaStore = new $this->mediaStore;

            //Create variables
            $name = time(). $media->getClientOriginalName();
            $name = MediaStore::getValidFilename($name);

            //Check for extension
            $extension = strtolower($media->getClientOriginalExtension());

            if($extension == 'heic'){

                //Make new file name with correct extension
                $exName = basename(strtolower($name), '.heic');
                $name = $exName . '.png';

                //Save the converted image and delete original
                HeicToJpg::convert($media->getRealPath())->saveAs(public_path('assets/images/' . $this->folder . '/' . $name));

            } else {

                //Save original version image
                $newMedia = $media->storeAs('assets/images/' . $this->folder , $name);
            }

            $myImage = Image::make(public_path('assets/images/' . $this->folder . '/' . $name));
            $imageHasOrientation = $myImage->exif('Orientation');

            //Save crop version image
            $thisModel->crop($myImage, $this->folder, $name, $mediaStore, $this->template, $this->relation_id );

            //Check for orientation
            if($imageHasOrientation){
                $myImage = Image::make(public_path('assets/images/' . $this->folder . '/crop/' . $name));
                $thisModel->hasOrientation($myImage, $imageHasOrientation, $this->folder, $mediaStore, $name, $thisModel);
            }

            $mediaStore->file_original = $name;
            $mediaStore->file_crop = $name;
            $mediaStore->$this->relation_id = $this->template->id;
            $mediaStore->save();
        }
    }
}
