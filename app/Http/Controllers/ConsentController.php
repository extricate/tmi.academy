<?php

namespace App\Http\Controllers;

use App\Consent;
use App\School;
use Illuminate\Http\Request;

class ConsentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consents = Consent::paginate(25);
        return view('consent.index', compact('consents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::pluck('name', 'id');
        return view('consent.create', compact('schools'));
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
     * @param  \App\Consent  $consent
     * @return \Illuminate\Http\Response
     */
    public function show(Consent $consent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consent  $consent
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
     * @param  \App\Consent  $consent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consent $consent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consent  $consent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consent $consent)
    {
        //
    }
}
