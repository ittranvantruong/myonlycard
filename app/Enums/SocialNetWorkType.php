<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BrowerLink()
 * @method static static Phone()
 * @method static static Email()
 */
final class SocialNetWorkType extends Enum
{
    const BrowerLink = 1;
    const Phone = 2;
    const Email = 3;
    const Zalo = 4;
}
