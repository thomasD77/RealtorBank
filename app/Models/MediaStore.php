<?php

namespace App\Models;

use App\Jobs\UploadLargeImageFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Imagick;
use Intervention\Image\Facades\Image;
use Maestroerror\HeicToJpg;
use Illuminate\Foundation\Bus\DispatchesJobs;


class MediaStore extends Model
{
    use HasFactory;

    public function createAndStoreMedia($mediaStore, $template, $mediaItems, $folder, $relation_id)
    {
        $thisModel = new MediaStore();

        //Make sure there is a directory to save the images
        $path = public_path('assets/images/' . $folder);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $pathCrop = public_path('assets/images/' . $folder . '/crop');
        if(!File::isDirectory($pathCrop)){
            File::makeDirectory($pathCrop, 0777, true, true);
        }

        //Check how many files needs to be uploaded with the .HEIC format
        $countHEIC = 0;
        foreach ($mediaItems as $media ){
            //Check for .HEIC extension
            $extension = strtolower($media->getClientOriginalExtension());
            if($extension == 'heic' ) {
                $countHEIC += 1;
            }
        }

        //Create a job QUEUE when there are to many files in general or with the .HEIC format
        if($countHEIC >= 1 || count($mediaItems)){
            $mediaPaths = [];
            foreach ($mediaItems as $media ){
               $mediaPaths [] = [
                   'path' => [
                       'name' => $media->getClientOriginalName(),
                       'path' => $media->getRealPath(),
                       'extension' => $media->getClientOriginalExtension()
                   ]
               ];
            }

            //Example for UploadLargeImagesFiles Job

//            foreach ($mediaPaths as $media ){
//
//                $mediaStore = new $mediaStore;
//
//                //Create variables
//                $name = time(). $media['path']['name'];
//                $name = MediaStore::getValidFilename($name);
//
//                //Check for extension
//                $extension = strtolower($media['path']['extension']);
//
//                if($extension == 'heic'){
//
//                    //Make new file name with correct extension
//                    $exName = basename(strtolower($name), '.heic');
//                    $name = $exName . '.png';
//
//                    //Clean file name
//                    $convertPath = str_replace('0', '' , file_get_contents($media['path']['path']));
//
//                    //Save the converted image and delete original
//                    HeicToJpg::convert($convertPath)
//                        ->saveAs(public_path('assets/images/' . $this->folder . '/' . $name));
//
//                } else {
//                    Storage::disk('local')
//                        ->put('assets/images/basic/'.$name, file_get_contents($media['path']['path']), 'public');
//                }
//
//                $myImage = Image::make(public_path('assets/images/' . $folder . '/' . $name));
//                $imageHasOrientation = $myImage->exif('Orientation');
//
//                //Save crop version image
//                $thisModel->crop($myImage, $folder, $name, $mediaStore, $template, $relation_id );
//
//                //Check for orientation
//                if($imageHasOrientation){
//                    $myImage = Image::make(public_path('assets/images/' . $folder . '/crop/' . $name));
//                    $thisModel->hasOrientation($myImage, $imageHasOrientation, $folder, $mediaStore, $name, $thisModel);
//                }
//
//                $mediaStore->file_original = $name;
//                $mediaStore->file_crop = $name;
//                $mediaStore->$relation_id = $template->id;
//                $mediaStore->save();
//            }

            dispatch(new UploadLargeImageFiles($mediaStore, $template, $folder, $relation_id, $mediaPaths));

            Session::flash('process', 'De afbeeldingen zijn aan het uploaden. Dit kan even duren. Kom gerust later terug om deze te bewerken.');
            return;
        }

        //Save original image
        foreach ($mediaItems as $media ){

            $mediaStore = new $mediaStore;

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
                HeicToJpg::convert($media->getRealPath())->saveAs(public_path('assets/images/' . $folder . '/' . $name));

            } else {

                //Save original version image
                $newMedia = $media->storeAs('assets/images/' . $folder , $name);
            }

            //Create variables
            $myImage = Image::make(public_path('assets/images/' . $folder . '/' . $name));
            $imageHasOrientation = $myImage->exif('Orientation');

            //Image compressor
            File::delete('assets/images/' . $folder . '/' . $mediaStore->file_original);
            $myImage->save(public_path('assets/images/' . $folder ) . '/' . $name, 50);

            //Save crop version image
            $thisModel->crop($myImage, $folder, $name, $mediaStore, $template, $relation_id );

            //Check for orientation
            if($imageHasOrientation){
                $myImage = Image::make(public_path('assets/images/' . $folder . '/crop/' . $name));
                $thisModel->hasOrientation($myImage, $imageHasOrientation, $folder, $mediaStore, $name, $thisModel);
            }

            $mediaStore->file_original = $name;
            $mediaStore->file_crop = $name;
            $mediaStore->$relation_id = $template->id;
            $mediaStore->save();
        }
    }

    public function crop($myImage, $folder, $name, $mediaStore, $template, $relation_id)
    {
        $imgCrop = $myImage;
        $width = Image::make($imgCrop)->width();
        $height = Image::make($imgCrop)->height();

        if($width > $height){
            $imgCrop->resize( 450, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('assets/images/' . $folder . '/' . 'crop').'/'.$name);
        }else {
            $imgCrop->resize( 450, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('assets/images/' . $folder . '/' . 'crop').'/'.$name);
        }
    }

    public function orientate($image, $orientation)
    {
        switch ($orientation) {

            case 6:
                return $image->rotate(-90);

            case 2:
                return $image->flip('h');

            case 3:
                return $image->rotate(180);

            case 4:
                return $image->rotate(180)->flip('h');

            case 5:
                return $image->rotate(-90)->flip('h');

            case 7:
                return $image->rotate(-90)->flip('v');

            case 8:
                return $image->rotate(90);

            default:
                return $image;
        }
    }

    public static function deleteMedia($mediaStore, $folder)
    {
        File::delete('assets/images/' . $folder . '/' . $mediaStore->file_original);
        File::delete('assets/images/' . $folder . '/crop/' . $mediaStore->file_crop);
        $mediaStore->delete();
    }

    public static function getValidFilename($name)
    {
        $new = str_replace('#', '_', $name);
        $new = str_replace('%', '_', $new);
        $new = str_replace('&', '_', $new);
        $new = str_replace('{', '_', $new);
        $new = str_replace('}', '_', $new);
        $new = str_replace('\\', '_', $new);
        $new = str_replace('<', '_', $new);
        $new = str_replace('>', '_', $new);
        $new = str_replace('*', '_', $new);
        $new = str_replace('?', '_', $new);
        $new = str_replace(' ', '_', $new);
        $new = str_replace('$', '_', $new);
        $new = str_replace('!', '_', $new);
        $new = str_replace("'", '_', $new);
        $new = str_replace('"', '_', $new);
        $new = str_replace(':', '_', $new);
        $new = str_replace('@', '_', $new);
        $new = str_replace('+', '_', $new);
        $new = str_replace('`', '_', $new);
        $new = str_replace('|', '_', $new);
        $new = str_replace(',', '_', $new);
        $new = str_replace('(', '_', $new);
        $new = str_replace(')', '_', $new);
        return str_replace('=', '_', $new);
    }

    public function hasOrientation($myImage, $orientation, $folder, $mediaStore, $name, $thisModel)
    {
        $rotateImage = $thisModel->orientate($myImage, $orientation);
        File::delete('assets/images/' . $folder . '/crop/' . $mediaStore->file_original);
        $rotateImage->save(public_path('assets/images/' . $folder . '/crop/' . $name));
    }
}
