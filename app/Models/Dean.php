<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dean extends Model
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

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
