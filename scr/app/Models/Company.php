<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $primaryKey = 'company_id';

    protected $fillable = [
        'company_id',
        'company_name',
        'logo',
        'company_information',
        'tax_code',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_companies', 'company_id', 'user_id');
    }
}
