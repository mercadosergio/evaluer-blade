<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'progress_status_id',
        'team_id',
        'activity_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function team()
    {
        return $this->belongsTo(Activity::class, 'team_id');
    }

    public function progress()
    {
        return $this->belongsTo(Activity::class, 'progress_status_id');
    }

    public function proposal()
    {
        return $this->hasOne(Proposal::class, 'submission_id');
    }

    public function draft()
    {
        return $this->hasOne(Draft::class, 'submission_id');
    }

    public function researchProject()
    {
        return $this->hasOne(ResearchProject::class, 'submission_id');
    }

    public function grade()
    {
        return $this->hasOne(Grade::class, 'submission_id');
    }
}
