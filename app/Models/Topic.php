<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topic';

    protected $fillable = [
        'timePublic',
        'title',
        'big_headlines',
        'subheadings',
        'main_text',
        'statusId',
        'typeId',
        'schoolId',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function school()
    {
        return $this->belongsTo(Schools::class);
    }
}
