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
            $newMedia = $media->storeAs('assets/images/' . $folder . '/', $name);
            $mediaStore->file_original = $name;

            //Save crop version image
            $crop = time(). $media->getClientOriginalName();
            $imgCrop = Image::make($newMedia);
            $imgCrop->crop(550, 350)->save(public_path('assets/images/' . $folder . '/' . 'crop').'/'.$crop);
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
}
