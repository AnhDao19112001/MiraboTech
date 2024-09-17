<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QAndAs extends Model
{
    use HasFactory;

    protected $table = 'qanda';

    protected $fillable = [
        'question',
        'answer',
        'typeId',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
