<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    public $schools;

    public function __construct() {
        $this->middleware(['auth', 'admin'])->except(['getSchools']);
        $this->schools = School::paginate(25);
    }

    public function index()
    {
        $schools = $this->schools;
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        $schools = $this->schools;
        return view('schools.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:schools|string|max:255'
        ]);

        School::create($request->all());

        return redirect(route('schools.index'));
    }

    public function show($slug)
    {
        $result = School::where('slug', $slug)->firstOrFail();

        $school = $result;

        return view('schools.show', compact('school'));
    }

    public function edit($slug)
    {
        $school = School::where('slug', $slug)->firstOrFail();

        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        //
    }

    public function destroy(School $school)
    {
        //
    }

    public function getSchools()
    {
        $schools = School::pluck('id', 'name');
        return response()->json($schools);
    }
}
