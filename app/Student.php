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

    public function consentFields() {
        $consent = $this->consent;

        return $consent = $consent->only(
            'evaluation',
            'class',
            'school',
            'other_schools',
            'illustrations',
            'website'
        );
    }

    public function prepareConsentEmailData()
    {
        $consent = $this->consentFields();
        $consentExtra = $this->ministryConsentCheck();

        $render = array_merge($consent, $consentExtra);

        return $render;
    }

    public function tmiConsentCheck()
    {
        $consent = $this->consentFields();

        return $this->checkConsent($consent);
    }

    public function ministryConsentFields()
    {
        return $consent = $this->consent->only([
            'ministry_evaluation',
            'ministry_illustration',
            'ministry_website'
        ]);
    }

    public function ministryConsentCheck()
    {
        $consent = $this->ministryConsentFields();

        return $this->checkConsent($consent);
        /*$check = [];
        foreach ($consent as $element) {
            if ($element == true) {
                $check[] = true;
            } else {
                $check[] = false;
            }
        }

        if (in_array(false, $check)) {
            // array contains false, check if it contains true as well
            if (in_array(true, $check)) {
                // partial consent has been given
                return 'partial';
            };
            // no consent has been given
            return 'no';
        }
        // full consent has been given
        return 'full';*/
    }

    /**
     * Return either full, partial or no when it comes to consent.
     *
     * @param array $haystack
     * @return string
     */
    public function checkConsent(Array $haystack)
    {
        $check = [];
        foreach ($haystack as $element) {
            if ($element == true) {
                $check[] = true;
            } else {
                $check[] = false;
            }
        }

        if (in_array(false, $check)) {
            // array contains false, check if it contains true as well
            if (in_array(true, $check)) {
                // partial consent has been given
                return 'partial';
            };
            // no consent has been given
            return 'no';
        }
        // full consent has been given
        return 'full';
    }
}
