<?php

namespace App\Enums;

enum WeeklyClassification: string
{
    case KHONG_TO_CHUC = '0';
    case TO_CHUC = '1';

    public function label(): string
    {
        return match($this) {
            self::KHONG_TO_CHUC => 'không tổ chức',
            self::TO_CHUC => 'tổ chức',
        };
    }
}
