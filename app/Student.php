<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function schoolclass() {
        return $this->belongsTo(Schoolclass::class);
    }
}
