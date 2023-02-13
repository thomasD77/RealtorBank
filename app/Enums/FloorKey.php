<?php

namespace App\Enums;

enum FloorKey : string
{
    case BasementFloor = 'basementFloor';
    case GroundFloor = 'groundFloor';
    case UpperFloor = 'upperFloor';
    case Attic = 'attic';
    case Garage = 'garage';
    case Building = 'building';
    case DriveWay = 'driveWay';
}
