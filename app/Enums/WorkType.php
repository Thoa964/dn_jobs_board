<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class WorkType extends Enum
{
    const FIXED_FULL_TIME = 'Toàn thời gian cố định';
    const TEMP_FULL_TIME = 'Toàn thời gian tạm thời';
    const FIXED_HALF_TIME = 'Bán thời gian cố định';
    const TEMP_HALF_TIME = 'Bán thời gian tạm thời';
    const INTERNSHIP = 'Thực tập';
    const FIXED_ON_CALL = 'Theo hợp đồng tư vấn';
    const FIXED_OTHER = 'Khác';
}
