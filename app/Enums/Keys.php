<?php

namespace App\Enums;

enum Keys : string
{
    case FrontDoor = 'Voordeur';
    case BackDoor = 'Achterdeur';
    case Garage = 'Garage';
    case Mailbox = 'Brievenbus';
    case Doors = 'Binnendeuren';
}
