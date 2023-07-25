<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function advisors()
    {
        return $this->hasMany(Advisor::class);
    }

    public function coordinators()
    {
        return $this->hasMany(Coordinator::class);
    }

    public function lines()
    {
        return $this->hasMany(Line::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'program_id');
    }
}
