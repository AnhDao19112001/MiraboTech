<?php

namespace App\Enums;

enum StatusCourser: string
{
    case PLAN = '0';
    case NOW_REGISTERED = '1';
    case STOP_REGISTERED = '2';
    case ABORT = '3';

    public function label(): string
    {
        return match($this) {
            self::PLAN => 'kế hoạch',
            self::NOW_REGISTERED => 'đang nhận đăng ký',
            self::STOP_REGISTERED => 'ngừng nhận đăng ký',
            self::ABORT => 'hủy bỏ',
        };
    }
}
