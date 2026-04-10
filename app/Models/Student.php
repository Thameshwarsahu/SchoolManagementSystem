<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'adm_no',
        'name',
        'roll_no',
        'status',
        'class_id',
        'section_id',
        'house',
        'category',
        'gender',
        'dob',
        'doa',
        'coa',
        'blood_group',
        'height',
        'weight',
        'father_name',
        'mother_name',
        'guardian',
        'mobile_no',
        'wa_no',
        'religion',
        'mother_tongue',
        'aadhar',
        'pen',
        'apaar_id',
        'registered_email',
        'address',
        'tc_issue_date',
        'tc_session',
        'image'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Sections::class);
    }
}
