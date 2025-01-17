<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shakehand extends Model
{
    use HasFactory;

    protected $table = 'shakehand';

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
