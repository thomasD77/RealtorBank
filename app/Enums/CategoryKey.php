<?php

namespace App\Enums;

enum CategoryKey : string
{
    case Situation = 'situation';
    case Interior = 'interior';
    case Exterior = 'exterior';
    case Techniques = 'techniques';
    case Documents = 'documents';
}
