<?php

namespace App\Enums;

enum RoomKey : string
{
    case Basement = 'basement';
    case EntranceHall = 'entranceHall';
    case Toilet = 'toilet';
    case LivingRoom = 'livingRoom';
    case Kitchen = 'kitchen';
    case Bathroom = 'bathroom';
    case NightHall = 'nightHall';
    case Storage = 'storage';
    case Bedroom = 'bedroom';
}
