<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Customer()
 * @method static static UserManager()
 */
final class UserRole extends Enum
{
    const Customer =   1;
    const UserManager = 2;
}
