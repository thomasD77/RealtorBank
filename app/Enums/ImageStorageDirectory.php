<?php

namespace App\Enums;

enum ImageStorageDirectory : string
{
    case Meters = 'meters';
    case Inspections = 'inspections';
    case Documents = 'documents';
    case Techniques = 'technique';
    case Keys = 'keys';
    case BasicArea = 'basic';
    case SpecificArea = 'specific';
    case Conform = 'conform';
    case General = 'general';
}
