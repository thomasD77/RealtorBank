<?php

namespace App\Enums;

enum AreaKey : string
{
    case Floor = 'floor';
    case Celling = 'celling';
    case Door = 'door';
    case Wall = 'wall';
    case Window = 'window';
    case Heating = 'heating';
}
