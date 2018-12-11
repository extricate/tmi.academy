<?php

namespace App;

use Emadadly\LaravelUuid\Uuids;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'school_id',
    ];

    use Searchable;
    use Uuids;

    // Using UUIDs thus we set incrementing to false
    public $incrementing = false;

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
