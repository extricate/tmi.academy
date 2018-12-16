@extends('layouts.app')

@section('content')
    <header>

    </header>
    <div class="container float-header">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $school->name }}</h1>
                        <SearchComponent></SearchComponent>
                        @forelse($school->students as $student)
                            <div class="card mt-2 mb-2">
                                <div class="card-body">
                                    {{ $student->name }}
                                    <div class="float-right">
                                        @if($student->tmiConsentCheck() == 'full')
                                            <span class="badge badge-success badge-lg">
                                            <i class="fal fa-check-circle"></i>
                                        @elseif ($student->tmiConsentCheck() == "partial")
                                            <span class="badge badge-warning badge-lg">
                                            <i class="fal fa-tilde"></i>
                                        @else
                                            <span class="badge badge-danger badge-lg">
                                            <i class="fal fa-times-circle"></i>
                                        @endif
                                                Toestemming TMI
                                        </span>

                                        @if($student->ministryConsentCheck() == 'full')
                                           <span class="badge badge-success badge-lg">
                                           <i class="fal fa-check-circle"></i>
                                        @elseif ($student->ministryConsentCheck() == "partial")
                                            <span class="badge badge-warning badge-lg">
                                            <i class="fal fa-tilde"></i>
                                        @else
                                            <span class="badge badge-danger badge-lg">
                                            <i class="fal fa-times-circle"></i>
                                        @endif
                                            Toestemming Ministerie
                                        </span>

                                        <a href="/studenten/{{ $student->id }}/edit" class="btn btn-primary btn-sm">
                                            <i class="fal fa-wrench"></i>
                                        </a>
                                        {!! Form::open(['route' => ['student.destroy', $student], 'method' => 'DELETE', 'class' => 'display-inline']) !!}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fal fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        @empty
                            Deze school heeft nog geen leerlingen waarvan de toestemmingsformulieren ingediend zijn.
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
