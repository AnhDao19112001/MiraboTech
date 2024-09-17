<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    use HasFactory;

    protected $table = 'school';

    protected $fillable = [
        'nameSchool',
        'imageLogo',
        'imageSchool',
        'messageSchool',
        'postalCode',
        'provinceCity',
        'localLevels',
        'access',
        'businessHours',
        'phone',
        'PDF',
    ];

    public function urgent()
    {
        return $this->hasOne(Urgent::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
