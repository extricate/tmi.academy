<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consent extends Model
{
    protected $fillable = [
        'status',
        'given',
        'student_id',
    ];

    public function owner()
    {
        return $this->belongsTo(Student::class);
    }
}
