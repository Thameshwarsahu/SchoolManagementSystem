<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'staff_id',
        'designation',
        'department',
        'joining_date',
        'gender',
        'dob',
        'mobile_no',
        'email',
        'address',
        'salary',
        'bank_name',
        'account_no',
        'image',
        'blood_group',
        'status'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
