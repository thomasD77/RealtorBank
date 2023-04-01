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
        //Save original image
        foreach ($mediaItems as $media ){
            $mediaStore = new $mediaStore;

            $name = time(). $media->getClientOriginalName();

            //Make sure there is a directory to save the images
            $path = public_path('assets/images/' . $folder);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            //Create a name
            $name = MediaStore::getValidFilename($name);

            //Check for extension
            $extension = strtolower($media->getClientOriginalExtension());
            if($extension == 'heic'){

                //STEP I :: Make new file name with correct extension
                $exName = basename(strtolower($name), '.heic');
                $newName = $exName . '.png';

                //STEP II :: Save the converted image and delete original
                HeicToJpg::convert($media->getRealPath())->saveAs(public_path('assets/images/' . $folder . '/' . $newName));

                //STEP III :: Check the orientation and reset
                $myImage = Image::make(public_path('assets/images/' . $folder . '/' . $newName));
                $imageHasOrientation = $myImage->exif('Orientation');

                if($imageHasOrientation){
                    $rotation = new MediaStore();
                    $rotateImage = $rotation->orientate($myImage, $myImage->exif('Orientation'));
                    File::delete('assets/images/' . $folder . '/' . $mediaStore->file_original);
                    $rotateImage->save(public_path('assets/images/' . $folder . '/' . $newName));
                }

                $mediaStore->file_original = $newName;

                //STEP IIII :: Crop the image
                $cropFile = new MediaStore();
                $cropFile->crop($folder, $newName, $mediaStore, $template, $relation_id );

            } else {

                //Save original version image
                $newMedia = $media->storeAs('assets/images/' . $folder , $name);
                $mediaStore->file_original = $name;

                $myImage = Image::make(public_path('assets/images/' . $folder . '/' . $name));
                $imageHasOrientation = $myImage->exif('Orientation');

                if($imageHasOrientation){
                    $rotation = new MediaStore();
                    $rotateImage = $rotation->orientate($myImage, $myImage->exif('Orientation'));
                    File::delete('assets/images/' . $folder . '/' . $mediaStore->file_original);
                    $rotateImage->save(public_path('assets/images/' . $folder . '/' . $name));
                }

                //Save crop version image
                $newName = MediaStore::getValidFilename(time(). $media->getClientOriginalName());
                $cropFile = new MediaStore();
                $cropFile->crop($folder, $newName, $mediaStore, $template, $relation_id );

            }

        }
    }

    private function crop($folder, $newName, $mediaStore, $template, $relation_id)
    {
        $imgCrop = Image::make(public_path('assets/images/' . $folder . '/' . $newName));
        $width = Image::make($imgCrop)->width();
        $height = Image::make($imgCrop)->height();

        //Make sure there is a directory to save the images
        $path = public_path('assets/images/' . $folder . '/crop');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        if($width > $height){
            $imgCrop->resize( 450, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('assets/images/' . $folder . '/' . 'crop').'/'.$newName);
        }else {
            $imgCrop->resize( 450, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('assets/images/' . $folder . '/' . 'crop').'/'.$newName);
        }

        $mediaStore->file_crop = $newName;
        $mediaStore->$relation_id = $template->id;
        $mediaStore->save();
    }

    private function orientate($image, $orientation)
    {
        switch ($orientation) {

            // 888888
            // 88
            // 8888
            // 88
            // 88
            case 1:
                return $image;

            // 888888
            //     88
            //   8888
            //     88
            //     88
            case 2:
                return $image->flip('h');


            //     88
            //     88
            //   8888
            //     88
            // 888888
            case 3:
                return $image->rotate(180);

            // 88
            // 88
            // 8888
            // 88
            // 888888
            case 4:
                return $image->rotate(180)->flip('h');

            // 8888888888
            // 88  88
            // 88
            case 5:
                return $image->rotate(-90)->flip('h');

            // 88
            // 88  88
            // 8888888888
            case 6:
                return $image->rotate(-90);

            //         88
            //     88  88
            // 8888888888
            case 7:
                return $image->rotate(-90)->flip('v');

            // 8888888888
            //     88  88
            //         88
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
}
