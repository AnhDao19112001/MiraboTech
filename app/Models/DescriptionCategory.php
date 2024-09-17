<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescriptionCategory extends Model
{
    use HasFactory;

    protected $table = 'descriptionCategory';

    protected $fillable = [
        'descriptionText',
    ];
}
