@extends('layouts.app')

@section('content')
    <header>
    </header>
    <div class="container float-header">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h1>Scholen</h1>
                        @foreach($schools as $school)
                            <div class="card m-3">
                                <div class="card-body">
                                    <a class="h2" href="{{ $school->url() }}">{{ $school->name }}</a>
                                    Leerlingen: {{ $school->students->count() }}
                                </div>
                            </div>
                        @endforeach

                        {{ $schools->links() }}

                        <a class="btn btn-primary" href="{{ route('schools.create') }}">Nieuwe school</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection