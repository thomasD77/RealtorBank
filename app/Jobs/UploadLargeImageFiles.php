<?php

namespace App\Jobs;

use App\Models\MediaBasic;
use App\Models\MediaStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Imagick;

class UploadLargeImageFiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $template;
    public $mediaPaths;
    public $relation_id;
    public $folder;
    public $mediaModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $mediaModel, $template, $folder, $relation_id, $mediaPaths)
    {
        //
        $this->mediaPaths = $mediaPaths;
        $this->template = $template;
        $this->folder = $folder;
        $this->relation_id = $relation_id;
        $this->mediaModel = $mediaModel;
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
            $className = "App\Models\\" . $this->mediaModel;
            $mediaModel = new $className();

            //Create variables
            $name = time(). $media['path']['name'];
            $name = MediaStore::getValidFilename($name);

            //Check for extension
            $extension = strtolower($media['path']['extension']);

            if($extension == 'heic'){

                //Make new file name with correct extension
                $exName = basename(strtolower($name), '.heic');
                $name = $exName . '.png';

                //shell_exec('magick convert ' . $media['path']['path'] . ' ' . public_path('assets/images/' . $this->folder . '/' . $name));
                shell_exec('convert ' . $media['path']['path'] . ' ' . public_path('assets/images/' . $this->folder . '/' . $name));

                // Make the image from the new converted file
                Image::make(public_path('assets/images/' . $this->folder . '/' . $name));

            } else {
                Storage::disk('local')
                    ->put('assets/images/' . $this->folder . '/' . $name, file_get_contents($media['path']['path']), 'public');
            }

            $myImage = Image::make(public_path('assets/images/' . $this->folder . '/' . $name));
            $imageHasOrientation = $myImage->exif('Orientation');

            //Save crop version image
            $thisModel->crop($myImage, $this->folder, $name, $mediaModel, $this->template, $this->relation_id );

            //Check for orientation
            if($imageHasOrientation){
                $myImage = Image::make(public_path('assets/images/' . $this->folder . '/crop/' . $name));
                $thisModel->hasOrientation($myImage, $imageHasOrientation, $this->folder, $mediaModel, $name, $thisModel);
            }

            $relation_id = $this->relation_id;

            $mediaModel->file_original = $name;
            $mediaModel->file_crop = $name;
            $mediaModel->$relation_id = $this->template->id;
            $mediaModel->save();
        }
    }
}
