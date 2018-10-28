<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Quote;
use App\Events\NewQuote;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quote.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form data
        $validated = $request->validate([
            'product' => 'exists:products',
            'packages' => 'array|min:1',
            'packages.*' => 'exists:packages|distinct',
            'email' => 'required_unless:phone|email',
            'phone' => 'required_unless:email|numeric|min:9|max:13',
            'students' => 'required:min:25|max:5000',
        ]);

        /**
         * Calculate the actual value of the quote
         */

        // first we calculate the total price based on the product and students
        $total_price = $validated->product->base_price + ($validated->product->unit_price * $validated->students);

        // then we add the package prices to the total price
        foreach ($validated->packages as $package) {
            $total_price = $total_price + $package->base_price + ($package->unit_price * $validated->students);
        }

        // fire event that performs logic in the background
        event(new NewQuote($validated));

        // return
        return $total_price;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
