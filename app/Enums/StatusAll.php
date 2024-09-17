<?php

namespace App\Enums;

enum StatusAll: string
{
    case PRIVATE = '0';
    case PUBLIC = '1';
    case DRAFT = '2';

    public function label(): string
    {
        return match($this) {
            self::PRIVATE => 'private',
            self::PUBLIC => 'public',
            self::DRAFT => 'bản nháp',
        };
    }
}
