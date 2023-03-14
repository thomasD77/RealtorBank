<?php

namespace App\Enums;

enum ImageStorageDirectory : string
{
    case Meters = 'meters';
    case Documents = 'documents';
    case Techniques = 'technique';
}
