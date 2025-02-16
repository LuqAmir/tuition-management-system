<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'full_name',
        'email',
        'phone_number',
        'date_of_birth',
        'address',
        'gender',
        'status',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
