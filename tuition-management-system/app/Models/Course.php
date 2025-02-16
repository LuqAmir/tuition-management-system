<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_code',
        'course_name',
        'description',
        'fee',
    ];


    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments')->withTimestamps();
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
