<?php

namespace App\Http\Controllers;

use App\School;
use App\Schoolclass;
use Illuminate\Http\Request;

class SchoolclassController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::pluck('name', 'id');
        return view('schoolclasses.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id|integer|max:255',
            'quantity' => 'required|int|max:50',
        ]);

        // loop over the amount and create a new class for each
        for($i = 0; $i < $request->quantity; $i++) {
            Schoolclass::create([
                'school_id' => $request->school_id,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schoolclass $schoolclass
     * @return \Illuminate\Http\Response
     */
    public function show(Schoolclass $schoolclass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schoolclass $schoolclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Schoolclass $schoolclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Schoolclass $schoolclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schoolclass $schoolclass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schoolclass $schoolclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schoolclass $schoolclass)
    {
        //
    }
}
