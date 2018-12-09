<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    public $schools;

    public function __construct() {
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

        return view('schools.index');
    }

    public function show(School $school, $slug)
    {
        $result = School::where('slug', $slug)->first();

        if ($result == null) {
            $result = School::findOrFail($school->id);
        }

        $school = $result;

        return view('schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        $school = School::findOrFail($school->id);

        return view('schools.edit', compact('school'));
    }
}
