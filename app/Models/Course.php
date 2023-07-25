<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'courses_students', 'course_id', 'student_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'course_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function advisor()
    {
        return $this->belongsTo(Advisor::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
