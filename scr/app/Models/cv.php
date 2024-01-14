<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    use HasFactory;
    protected $table = 'cv';
    protected $primaryKey = 'cv_id';
    protected $fillable=[
        'cv_id',
        'fullname',
        'gender',
        'birthday',
        'avatar',
        'email',
        'phone',
        'academic_level',
        'current_job_description',
        'current_job_skills',
        'current_job_potision',
        'salary',
        'english_level',
        'it_level',
        'degree_path',
        'user_id'
    ];
    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}


