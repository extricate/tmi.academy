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
            'product' => 'required|exists:products',
            'product.required' => 'Je bent vergeten een product te selecteren!',
            'packages' => 'required|array|min:1',
            'packages.*' => 'exists:packages|distinct',
            'packages.required' => 'Je bent vergeten een of meerdere pakketten te selecteren!',
            'name' => 'string|required',
            'name.required' => 'We willen graag weten hoe we je kunnen noemen',
            'email' => 'required_unless:phone|email',
            'phone' => 'required_unless:email|numeric|min:9|max:13',
            'students' => 'required:min:25|max:5000',
            'students.required' => 'Je bent vergeten een hoeveelheid studenten te selecteren!',
            'comment' => 'nullable|max:4000'
        ]);

        // create a new contact before we can create the quote
        $contact = new Contact([
            'name' => $validated->name,
            'email' => $validated->email,
            'phone' => $validated->phone
        ]);

        // create the new quote
        $quote = new Quote([$validated->all(), 'contact_id' => $contact->id]);

        /**
         * Calculate the actual value of the quote
         */

        $quote->total_price = $quote->calculateValue();
        $quote->save();

        // fire event that performs additional logic in the background
        event(new NewQuote($validated));

        // return
        return compact(['quote', 'contact']);
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
