<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'available_from',
        'available_until',
        'type_id',
        'typename',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function drafts()
    {
        return $this->hasMany(Draft::class, 'activity_id');
    }

    public function propositions()
    {
        return $this->hasMany(Proposition::class, 'activity_id');
    }
}
