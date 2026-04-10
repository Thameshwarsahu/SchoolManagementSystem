<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $fillable = ['class_name', 'description'];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function sections()
    {
        return $this->hasMany(Sections::class, 'class_id');
    }
}
