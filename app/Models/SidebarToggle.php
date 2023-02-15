<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidebarToggle extends Model
{
    use HasFactory;

    public static function sidebarCategory($value)
    {
        $user = Auth()->user();

        if(isset($user->category)){
            if($user->category->id == $value){
                $user->category_id = null;
            }else {
                $user->category_id = $value;
            }
        }else {
            $user->category_id = $value;
        }

        $user->update();
    }
}
