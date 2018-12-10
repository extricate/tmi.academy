@extends('layouts.app')

@section('content')
    <header>
    </header>
    <div class="container float-header">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h1>Nieuwe school</h1>
                        {!! Form::model($schools, ['method' => 'POST', 'action' => ['SchoolController@store']]) !!}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Naam van de school') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Typ hier de naam van de school', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Nieuwe school aanmaken', ['class' => 'btn btn-primary']) !!}
                        </div>


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection