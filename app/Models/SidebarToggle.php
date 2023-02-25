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

    public static function sidebarRoom($value)
    {
        $user = Auth()->user();

        if(isset($user->room)){
            if($user->room->id == $value){
                $user->room_id = null;
            }else {
                $user->room_id = $value;
            }
        }else {
            $user->room_id = $value;
        }

        $user->update();
    }

    public static function sidebarFloor($value)
    {
        $user = Auth()->user();

        if(isset($user->floor)){
            if($user->floor->id == $value){
                $user->floor_id = null;
            }else {
                $user->floor_id = $value;
            }
        }else {
            $user->floor_id = $value;
        }

        $user->update();
    }

    public static function sidebarTemplate($value)
    {
        $user = Auth()->user();

        if(isset($user->template)){
            if($user->template == $value){
                $user->template = null;
            }else {
                $user->template = $value;
            }
        }else {
            $user->template = $value;
        }

        $user->update();
    }
}
