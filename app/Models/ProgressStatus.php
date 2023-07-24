<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'progress_status_id');
    }
}
