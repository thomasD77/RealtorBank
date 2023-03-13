<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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

            $name = MediaStore::getValidFilename($name);
            $newMedia = $media->storeAs('assets/images/' . $folder . '/', $name);
            $mediaStore->file_original = $name;

            //Save crop version image
            $crop = time(). $media->getClientOriginalName();

            $imgCrop = Image::make($newMedia);
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
}
