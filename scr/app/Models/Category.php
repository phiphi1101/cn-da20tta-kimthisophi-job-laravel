<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_id',
        'category_name',
    ];

    public function jobs()
    {
        return $this->belongsToMany('App\Models\Job', 'job_categories', 'category_id', 'job_id');
    }
}
