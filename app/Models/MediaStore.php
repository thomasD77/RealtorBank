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

//    public static function createAndStoreMedia($mediaStore, $template, $mediaItems, $folder, $relation_id){
//        foreach ($mediaItems as $media){
//
//            $imagick = new Imagick();
//
//            $test = $imagick->readImage($media);
//            dd($test);
//
//            $imagick->writeImages('converted.jpg', false);
//        }
//    }

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
            $newMedia = $media->storeAs('assets/images/' . $folder , $name);
            $mediaStore->file_original = $name;


            //Check for extension
            $extension = $media->getClientOriginalExtension();

            if($extension == 'heic'){
                //STEP I :: Make new file name with correct extension
                $exName = basename($name, '.HEIC');
                $newName = $exName . '.png';

                //STEP II :: Save the converted image and delete original
                $img = HeicToJpg::convert($newMedia)->saveAs(public_path('assets/images/' . $folder . '/' . $newName));
                File::delete('assets/images/' . $folder . '/' . $mediaStore->file_original);

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
            }


            //Save crop version image
            $crop = MediaStore::getValidFilename(time(). $media->getClientOriginalName());
            $imgCrop = Image::make($newMedia)->rotate(360);
            $width = Image::make($newMedia)->width();
            $height = Image::make($newMedia)->height();

            //Make sure there is a directory to save the images
            $path = public_path('assets/images/' . $folder . '/crop');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($width > $height){
                $imgCrop->resize( 450, 350, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('assets/images/' . $folder . '/' . 'crop').'/'.$crop);
            }else {
                $imgCrop->resize( 450, 350, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('assets/images/' . $folder . '/' . 'crop').'/'.$crop);
            }

            $mediaStore->file_crop = $crop;

            $mediaStore->$relation_id = $template->id;
            $mediaStore->save();
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

    public function orientate($image, $orientation)
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
}
