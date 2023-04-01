<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Imagick;
use Intervention\Image\Facades\Image;
use Maestroerror\HeicToJpg;

class MediaStore extends Model
{
    use HasFactory;

    public static function createAndStoreMedia($mediaStore, $template, $mediaItems, $folder, $relation_id)
    {
        //Make sure there is a directory to save the images
        $path = public_path('assets/images/' . $folder);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $pathCrop = public_path('assets/images/' . $folder . '/crop');
        if(!File::isDirectory($pathCrop)){
            File::makeDirectory($pathCrop, 0777, true, true);
        }
        $thisModel = new MediaStore();

        //Save original image
        foreach ($mediaItems as $media ){

            $mediaStore = new $mediaStore;

            //Create variables
            $name = time(). $media->getClientOriginalName();
            $name = MediaStore::getValidFilename($name);

            //Check for extension
            $extension = strtolower($media->getClientOriginalExtension());

            if($extension == 'heic'){

                //STEP I :: Make new file name with correct extension
                $exName = basename(strtolower($name), '.heic');
                $name = $exName . '.png';

                //STEP II :: Save the converted image and delete original
                HeicToJpg::convert($media->getRealPath())->saveAs(public_path('assets/images/' . $folder . '/' . $name));

                $myImage = Image::make(public_path('assets/images/' . $folder . '/' . $name));
                $imageHasOrientation = $myImage->exif('Orientation');

                //STEP III :: Crop the image
                $thisModel->crop($myImage, $folder, $name, $mediaStore, $template, $relation_id );

                //STEP IIII :: Check the orientation and reset
                if($imageHasOrientation){
                    $myImage = Image::make(public_path('assets/images/' . $folder . '/crop/' . $name));
                    $thisModel->hasOrientation($myImage, $imageHasOrientation, $folder, $mediaStore, $name, $thisModel);
                }

            } else {

                //Save original version image
                $newMedia = $media->storeAs('assets/images/' . $folder , $name);
                $myImage = Image::make(public_path('assets/images/' . $folder . '/' . $name));
                $imageHasOrientation = $myImage->exif('Orientation');

                //Save crop version image
                $thisModel->crop($myImage, $folder, $name, $mediaStore, $template, $relation_id );

                //Check for orientation
                if($imageHasOrientation){
                    $myImage = Image::make(public_path('assets/images/' . $folder . '/crop/' . $name));
                    $thisModel->hasOrientation($myImage, $imageHasOrientation, $folder, $mediaStore, $name, $thisModel);
                }
            }

            $mediaStore->file_original = $name;
            $mediaStore->file_crop = $name;
            $mediaStore->$relation_id = $template->id;
            $mediaStore->save();
        }
    }

    private function crop($myImage, $folder, $name, $mediaStore, $template, $relation_id)
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

    private function orientate($image, $orientation)
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

    private function hasOrientation($myImage, $orientation, $folder, $mediaStore, $name, $thisModel)
    {
        $rotateImage = $thisModel->orientate($myImage, $orientation);
        File::delete('assets/images/' . $folder . '/crop/' . $mediaStore->file_original);
        $rotateImage->save(public_path('assets/images/' . $folder . '/crop/' . $name));
    }
}
