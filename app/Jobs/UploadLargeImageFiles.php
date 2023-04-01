<?php

namespace App\Jobs;

use App\Models\MediaStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Maestroerror\HeicToJpg;

class UploadLargeImageFiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mediaStore;
    public $template;
    public $mediaPaths;
    public $relation_id;
    public $folder;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mediaStore, $template, $folder, $relation_id, $mediaPaths)
    {
        //
        $this->mediaPaths = $mediaPaths;
        $this->mediaStore = $mediaStore;
        $this->template = $template;
        $this->folder = $folder;
        $this->relation_id = $relation_id;

        $thisModel = new MediaStore();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        foreach ($this->mediaPaths as $media ){

            $thisModel = new MediaStore();

            $mediaStore = new $this->mediaStore;

            //Create variables
            $name = time(). $media['path']['name'];
            $name = MediaStore::getValidFilename($name);

            //Check for extension
            $extension = strtolower($media['path']['extension']);

            if($extension == 'heic'){

                //Make new file name with correct extension
                $exName = basename(strtolower($name), '.heic');
                $name = $exName . '.png';

                //Clean file name
                $convertPath = str_replace('0', '' , file_get_contents($media['path']['path']));

                //Save the converted image and delete original
                HeicToJpg::convert($convertPath)
                    ->saveAs(public_path('assets/images/' . $this->folder . '/' . $name));

            } else {
                Storage::disk('local')
                    ->put('assets/images/basic/'.$name, file_get_contents($media['path']['path']), 'public');
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

            $relation_id = $this->relation_id;

            $mediaStore->file_original = $name;
            $mediaStore->file_crop = $name;
            $mediaStore->$relation_id = $this->template->id;
            $mediaStore->save();
        }
    }
}
