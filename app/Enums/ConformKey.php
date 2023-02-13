<?php

namespace App\Enums;

enum ConformKey : string
{
    case VentilationGrid = 'ventilationGrid';
    case SmokeDetector = 'smokeDetector';
    case Socket = 'socket';
    case Switches = 'switches';
    case Connection = 'connection';
    case Lighting = 'lighting';
    case Ventilator = 'ventilator';
}
