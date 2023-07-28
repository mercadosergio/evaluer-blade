<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'first_lastname',
        'second_lastname',
        'dni',
        'program',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'advisor_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'advisor_id', 'id');
    }
}
