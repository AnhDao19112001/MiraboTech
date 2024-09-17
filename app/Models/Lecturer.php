<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'leturer';

    protected $fillable = [
        'instructorCode',
        'name',
        'subject',
        'imageLecturer',
    ];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
