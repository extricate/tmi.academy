<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consent extends Model
{
    // disable mass assignment protection
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(Student::class);
    }

    public function fields()
    {
        return null;
    }
}
