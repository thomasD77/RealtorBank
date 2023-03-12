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
    case Attic = 'attic';
    case Garage = 'garage';

    case Building = 'building';
    case DriveWay = 'driveWay';
    case FrontYard = 'frontYard';
    case Yard = 'yard';
    case Terrace = 'terrace';

    case OutHouseIn = 'outHouseIn';
    case OutHouseEx = 'outHouseEx';
}
