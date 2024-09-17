<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urgent extends Model
{
    use HasFactory;

    protected $table = 'urgent';

    protected $fillable = [
        'urgentStatus',
        'urgentText',
    ];

    public function school()
    {
        return $this->belongsTo(Schools::class);
    }
}
