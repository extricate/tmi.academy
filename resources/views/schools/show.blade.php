@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">

                    {{ $school->name }}
                    {{ $school->id }}

                    @foreach($school->students as $student)
                        {{ $student->name }}
                        {{ $student->getConsentStatus() }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
