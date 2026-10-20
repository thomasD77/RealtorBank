<?php

namespace App\Enums;

enum Status : string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Failed = 'failed';
    case Canceled = 'canceled';
    case Rendered = 'rendered';
}
