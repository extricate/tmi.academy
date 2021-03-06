<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function quotes() {
        return $this->hasMany(Quote::class);
    }
}
