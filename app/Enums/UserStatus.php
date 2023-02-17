<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Customer()
 * @method static static UserManager()
 */
final class UserStatus extends Enum
{
    const Active =   1;
    const Lock = 2;
}
