<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'path',
        'submission_id',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }
}
