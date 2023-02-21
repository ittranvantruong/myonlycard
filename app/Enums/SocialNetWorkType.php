<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Simple()
 * @method static static Custom()
 * @method static static AccountBank()
 * @method static static Text()
 */
final class SocialNetWorkType extends Enum
{
    const Simple = 1;
    const Custom = 2;
    const AccountBank = 3;
    const Text = 4;
}
