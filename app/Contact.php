<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    use SoftDeletes;

    public function quotes() {
        return $this->hasMany(Quote::class);
    }
}
