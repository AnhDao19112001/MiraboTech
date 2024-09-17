<?php

namespace App\Enums;

enum DateClassification: string
{
    case MONDAY = '0';
    case TUESDAY = '1';
    case WEDNESDAY = '2';
    case THURSDAY = '3';
    case FRIDAY = '4';
    case SATURDAY = '5';
    case SUNDAY = '6';

    public function label(): string
    {
        return match($this) {
            self::MONDAY => 'thứ hai',
            self::TUESDAY => 'thứ ba',
            self::WEDNESDAY => 'thứ tư',
            self::THURSDAY => 'thứ năm',
            self::FRIDAY => 'thứ sáu',
            self::SATURDAY => 'thứ bảy',
            self::SUNDAY => 'chủ nhật',
        };
    }
}
