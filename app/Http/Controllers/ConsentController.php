<?php

namespace App\Http\Controllers;

use App\Consent;
use Illuminate\Http\Request;

class ConsentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consent = Consent::paginate(25);
        return view('consent.index', compact('consent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \TMI.academy\Consent  $consent
     * @return \Illuminate\Http\Response
     */
    public function show(Consent $consent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \TMI.academy\Consent  $consent
     * @return \Illuminate\Http\Response
     */
    public function edit(Consent $consent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \TMI.academy\Consent  $consent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consent $consent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \TMI.academy\Consent  $consent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consent $consent)
    {
        //
    }
}
