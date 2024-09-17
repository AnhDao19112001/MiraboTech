<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAll extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'nameCategory',
        'descriptionName',
        'descriptionCategoryId'
    ];
    public function category()
    {
        return $this->belongsTo(DescriptionCategory::class);
    }
}
