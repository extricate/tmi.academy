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
                            <div class="card m-2">
                                <div class="card-body">
                                    {{ $student->name }}
                                    @if($student->fullConsentGiven())
                                        <span class="badge badge-success">
                                            Volledige toestemming
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            Onvolledige of geen toestemming
                                        </span>
                                    @endif
                                    <div class="float-right">
                                        {!! Form::open(['route' => ['student.destroy', $student], 'method' => 'DELETE']) !!}
                                        {!! Form::submit('x', ['class' => 'btn btn-primary btn-danger btn-sm']) !!}
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
