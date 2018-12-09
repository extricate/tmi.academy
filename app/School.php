<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
    ];

    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function classes() {
        return $this->hasMany(Schoolclass::class);
    }

    public function students() {
        return $this->hasManyThrough(Student::class, Schoolclass::class);
    }
}
