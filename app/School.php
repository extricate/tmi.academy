<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function classes() {
        return $this->hasMany(Schoolclass::class);
    }

    public function students() {
        return $this->hasManyThrough(Student::class, Schoolclass::class);
    }
}
