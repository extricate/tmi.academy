<?php

namespace App\Http\Controllers;

use App\Consent;
use App\Mail\ConsentOverviewForParents;
use App\School;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConsentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['create', 'store', 'thanks', 'email']);
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
        $request->validate([
            'school_id' => 'required|exists:schools,id|integer|max:255',
            'consenter_name' => 'required|string|min:4|max:255',
            'student_name' => 'required|string|min:4|max:255',
            'evaluation' => 'boolean|nullable',
            'class' => 'boolean|nullable',
            'school' => 'boolean|nullable',
            'other_schools' => 'boolean|nullable',
            'illustrations' => 'boolean|nullable',
            'website' => 'boolean|nullable',
            'ministry_evaluation' => 'boolean|nullable',
            'ministry_illustration' => 'boolean|nullable',
            'ministry_website' => 'boolean|nullable',
            'of_age' => 'required|boolean',
            'legal_representative' => 'required|boolean',
            'truth' => 'required|boolean',
        ]);

        // first we create a student based on this
        $student = Student::create([
            'name' => $request->student_name,
            'school_id' => $request->school_id,
        ]);

        // create consent
        Consent::create([
            'consenter_name' => $request->consenter_name,
            'student_id' => $student->id,
            'evaluation' => $request->evaluation,
            'class' => $request->class,
            'school' => $request->school,
            'other_schools' => $request->other_schools,
            'illustrations' => $request->illustrations,
            'website' => $request->website,
            'ministry_evaluation' => $request->ministry_evaluation,
            'ministry_illustration' => $request->ministry_illustration,
            'ministry_website' => $request->ministry_website,
            'of_age' => $request->of_age,
            'legal_representative' => $request->legal_representative,
            'truth' => $request->truth,
            'ip_address' => $request->ip(),
        ]);

        return redirect(route('consent.thanks', $student));
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

    /**
     * Show thank you message after completing a submission
     */
    public function thanks($student)
    {
        $student = Student::findOrFail($student);
        return view('consent.thanks', compact('student'));
    }

    /**
     * Send email message if consent giver wants to receive it
     */
    public function email(Request $request, $id)
    {
        $request->validate([
            'email' => 'email|string|required'
        ]);

        $student = Student::findOrFail($id);

        Mail::to($request->email)->send(new ConsentOverviewForParents($student));

        return redirect()->back()->with('message', 'Het overzicht is verzonden naar ' . $request->email .  '!');
    }
}
