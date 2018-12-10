<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'school_id',
    ];

    use Searchable;

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function consent() {
        return $this->hasOne(Consent::class);
    }

    public function fullConsentGiven() {
        $consent = $this->consent;

        $consent = $consent->only(
            'evaluation',
            'class',
            'school',
            'other_schools',
            'illustrations',
            'website',
            'ministry_evaluation',
            'ministry_illustration',
            'ministry_website'
        );

        foreach ($consent as $element) {
            if ($element != true) {
                return false;
            }
        }

        return true;
    }
}
