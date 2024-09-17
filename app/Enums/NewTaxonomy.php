<?php

namespace App\Enums;

enum NewTaxonomy: string
{
    case TAO_MOI = '0';
    case LAM_LAI = '1';
    case TIEP_TUC = '2';

    public function label(): string
    {
        return match($this) {
            self::TAO_MOI => 'tạo mới',
            self::LAM_LAI => 'làm lại',
            self::TIEP_TUC => 'tiếp tục',
        };
    }
}
