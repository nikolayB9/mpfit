<?php

namespace App\Enums\Order;

use App\Enums\Attributes\Description;
use App\Enums\Traits\GetsAttributes;

enum StatusEnum: int
{
    use GetsAttributes;

    #[Description('новый')]
    case NEW = 1;

    #[Description('выполнен')]
    case COMPLETED = 2;
}
