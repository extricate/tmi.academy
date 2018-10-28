<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'contact_id',
        'created_at',
        'updated_at'
    ];

    public function product() {
        return $this->hasOne(Product::class);
    }

    public function packages() {
        return $this->belongsToMany(Package::class);
    }

    public function contact() {
        return $this->belongsTo(Contact::class);
    }
}
