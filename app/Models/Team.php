<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_teams', 'team_id', 'student_id');
    }
}
