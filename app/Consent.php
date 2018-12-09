<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consent extends Model
{
    public function owner() {
        return $this->belongsTo(Student::class);
    }
}
