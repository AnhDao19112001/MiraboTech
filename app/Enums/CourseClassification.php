<?php

namespace App\Enums;

enum CourseClassification: string
{
    case KHOA_HOC_THONG_THUONG = '1';
    case KHOA_HOC_THEO_SO_LAN = '2';
    case KHOA_HOC_TRONG_NGAY = '3';

    public function label(): string
    {
        return match($this) {
            self::KHOA_HOC_THONG_THUONG => 'Khóa học thông thường',
            self::KHOA_HOC_THEO_SO_LAN => 'Khóa học theo số lần',
            self::KHOA_HOC_TRONG_NGAY => 'Khóa học trong ngày',
        };
    }
}
