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
                                        @if($student->tmiConsentCheck())
                                            <span class="badge badge-success badge-lg">
                                            <i class="fal fa-check-circle"></i> Toestemming TMI
                                        </span>
                                        @else
                                            <span class="badge badge-danger badge-lg">
                                            <i class="fal fa-times-circle"></i> Toestemming TMI
                                        </span>
                                        @endif

                                        @if($student->ministryConsentCheck())
                                            <span class="badge badge-success badge-lg">
                                            <i class="fal fa-check-circle"></i> Toestemming Ministerie
                                        </span>
                                        @else
                                            <span class="badge badge-danger badge-lg">
                                            <i class="fal fa-times-circle"></i> Toestemming Ministerie
                                        </span>
                                        @endif

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
