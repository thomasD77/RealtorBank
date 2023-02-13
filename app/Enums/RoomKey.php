<?php

namespace App\Enums;

enum RoomKey : string
{
    case Kelder = 'basement';
    case Inkomhal = 'entranceHall';
    case Toilet = 'toilet';
    case Woonkamer = 'livingRoom';
    case Keuken = 'kitchen';
    case Badkamer = 'bathroom';
    case Nachthal = 'nightHall';
    case Berging = 'storage';
    case Slaapkamer = 'bedroom';
}
