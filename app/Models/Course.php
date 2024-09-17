<?php

namespace App\Models;

use App\Enums\CourseClassification;
use App\Enums\DateClassification;
use App\Enums\NewTaxonomy;
use App\Enums\StatusCourser;
use App\Enums\WeeklyClassification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courser';

    protected $fillable = [
        'middlecategoryName',
        'courserClassification' => CourseClassification::class,
        'courserCode',
        'sourserNameKana',
        'sourserNameKana2',
        'subtitleOn',
        'subtitleBelow',
        'courseName',
        'newTaxonomy' => NewTaxonomy::class,
        'weeklyClassification1' => WeeklyClassification::class,
        'weeklyClassification2' => WeeklyClassification::class,
        'weeklyClassification3' => WeeklyClassification::class,
        'weeklyClassification4' => WeeklyClassification::class,
        'weeklyClassification5' => WeeklyClassification::class,
        'dateClassification' => DateClassification::class,
        'room',
        'status' => StatusCourser::class,
        'learningInTheMiddle',
        'investigate',
        'items',
        'note',
        'abbreviate',
        'detail',
        'web',
        'duration',
        'lecturerId',
        'schoolId',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function school()
    {
        return $this->belongsTo(Schools::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryAll::class);
    }
}
