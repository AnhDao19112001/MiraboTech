<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'message';

    protected $fillable = [
        'messageText',
        'courserId'
    ];

    public function cousers()
    {
        return $this->belongsTo(Course::class);
    }
}
