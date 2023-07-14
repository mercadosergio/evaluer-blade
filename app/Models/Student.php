<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'first_lastname',
        'second_lastname',
        'dni',
        'program',
        'semester',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_students', 'student_id', 'course_id');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'students_teams', 'student_id', 'team_id');
    }
}
