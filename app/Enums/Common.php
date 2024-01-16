<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Common extends Enum
{
    const UPLOAD_AVATAR_PATH = 'upload/avatar/';
    const DEFAULT_AVATAR_NAME = 'default.png';
    const DEFAULT_ITEMS_PER_PAGE = 10;
    const MALE = 'Nam';
    const FEMALE = 'Nữ';
    const DOANH_NGHIEP = 3;
    const ADMIN = 1;
    const USER = 2;
    const MONTH_DAYS = 30;
    const ACTIVATED = 1;
    const DEACTIVATED = 0;
    const DEFAULT_PASSWORD = 'thoa2503';
    const NOT_VERIFIED = -1;
    const APPROVED = 1;
    const UNAPPROVED = 0;
    const REJECTED = -1;
    const SOFT_DELETED = -99;
}
