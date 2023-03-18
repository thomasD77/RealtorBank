<?php

namespace App\Enums;

enum Status : string
{
    case Pending = 'pending';
    case Canceled = 'canceled';
    case Rendered = 'rendered';
}
