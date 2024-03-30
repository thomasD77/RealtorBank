<?php

namespace App\Enums;

enum OutdoorKey : string
{
    case Walls = 'walls';
    case Windows = 'windows';
    case Roof = 'roof';
    case Mailbox = 'mailbox';
    case OutdoorTrap = 'outdoorTrap';
    case Balcony = 'balcony';
    case DriveWayMaterial = 'driveWayMaterial';
    case FootPathMaterial = 'footPathMaterial';
    case Gate = 'gate';
    case Fence = 'fence';
    case GardenGate = 'gardenGate';
    case OutdoorLight = 'outdoorLight';
    case Planting = 'planting';
    case ExtraFrontYard = 'extraFrontYard';
    case TerraceMaterial = 'terraceMaterial';
    case Crane = 'crane';
    case Sockets = 'sockets';
    case Switches = 'switches';
    case OutsideDoor = 'outsideDoor';

    case Celling = 'celling';

    case Wall = 'outsideWall';
    case OutsideWindows = 'outsideWindows';

    case Lighting = 'lighting';

    case Handrail = 'handrail';
}
