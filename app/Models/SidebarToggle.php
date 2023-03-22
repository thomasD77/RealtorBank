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

        if(isset($user->sidebar_category_id)){
            if($user->sidebar_category_id == $value){
                $user->sidebar_category_id = null;
            }else {
                $user->sidebar_category_id = $value;
            }
        }else {
            $user->sidebar_category_id = $value;
        }

        $user->update();

        return $user->sidebar_category_id;
    }

    public static function sidebarFloor($value)
    {
        $user = Auth()->user();

        if(isset($user->sidebar_floor_id)){
            if($user->sidebar_floor_id == $value){
                $user->sidebar_floor_id = null;
            }else {
                $user->sidebar_floor_id = $value;
            }
        }else {
            $user->sidebar_floor_id = $value;
        }

        $user->update();

        return $user->sidebar_floor_id;
    }

    public static function sidebarRoom($value)
    {
        $user = Auth()->user();

        if(isset($user->sidebar_room_id)){
            if($user->sidebar_room_id == $value){
                $user->sidebar_room_id = null;
            }else {
                $user->sidebar_room_id = $value;
            }
        }else {
            $user->sidebar_room_id = $value;
        }

        $user->update();

        return $user->sidebar_room_id;
    }


    public static function sidebarTemplate($value)
    {
        $user = Auth()->user();

        if(isset($user->sidebar_template)){
            if($user->sidebar_template == $value){
                $user->sidebar_template = null;
            }else {
                $user->sidebar_template = $value;
            }
        }else {
            $user->sidebar_template = $value;
        }

        $user->update();

        return $user->sidebar_template;
    }
}
