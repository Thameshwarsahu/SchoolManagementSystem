<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'school_name',
        'school_code',
        'mobile',
        'email',
        'address',
        'session_year',
        'logo',
        'sign'
    ];
}
