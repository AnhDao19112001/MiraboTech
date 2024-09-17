<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'time_public',
        'title',
        'big_headlines',
        'subheadings',
        'main_text',
        'block_image',
        'block_youtube',
        'list_block',
        'statusId',
        'typeId',
        'users_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
