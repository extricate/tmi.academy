<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Quote extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'contact_id',
        'created_at',
        'updated_at'
    ];

    public function url() {
        return 'http://fuckjemoeder.nl';
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function packages() {
        return $this->belongsToMany(Package::class);
    }

    public function contact() {
        return $this->belongsTo(Contact::class);
    }

    /**
     * Calculate the total price of the requested quote
     *
     * @return float|int
     */
    public function calculateValue() {
        $total_price = $this->product->base_price + ($this->product->unit_price * $this->students);

        // then we add the package prices to the total price
        foreach ($this->packages as $package) {
            $total_price = $total_price + $package->base_price + ($package->unit_price * $this->students);
        }

        return $total_price;
    }
}
