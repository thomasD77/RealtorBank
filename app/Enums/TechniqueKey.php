<?php

namespace App\Enums;

enum TechniqueKey : string
{
    case FuseBox = 'fuseBox';
    case cvDevice = 'cvDevice';
    case Boiler = 'boiler';
    case WaterSoftener = 'waterSoftener';
    case WaterPump = 'waterPump';
    case Airco = 'airco';
    case VentilationGroup = 'ventilationGroup';
    case SolarPanels = 'solarPanels';
    case Converter = 'converter';
}
