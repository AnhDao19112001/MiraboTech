<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;

    protected $table = 'special';

    protected $fillable = [
        'timePublic',
        'title',
        'imageMV',
        'statusId',
        'purposeId'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }
}
