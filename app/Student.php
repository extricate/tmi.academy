<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'school_id',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function consent() {
        return $this->hasOne(Consent::class);
    }

    public function getConsentStatus() {
        $consent = $this->consent;
        dd($consent);
        if ($consent->in_array(false || null)) {
            return 'partial consent given';
        }

        return 'full consent given';
    }
}
