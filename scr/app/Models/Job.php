<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $primaryKey = 'job_id';

    protected $fillable = [
        'job_id',
        'job_name',
        'job_location',
        'job_description',
        'salary',
        'years_of_experience',
        'expiration_date',
        'type_of_job',
        'job_title',
        'academic_level',
        'is_male',
        'is_female',
        'age',
        'contact',
        'active',
        'company_id',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'job_categories', 'job_id', 'category_id');
    }

    public function recruitments()
    {
        return $this->belongsToMany('App\Models\User', 'recruitments', 'job_id', 'user_id');
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company', 'company_id', 'company_id');
    }
}
