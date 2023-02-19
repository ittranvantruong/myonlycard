<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Active()
 * @method static static Lock()
 */
final class UserStatus extends Enum
{
    const Active =   1;
    const Lock = 2;
}
