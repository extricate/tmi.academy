{!! Form::model(['method' => 'POST', 'action' => ['SchoolclassController@store']]) !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::label('School') !!}
{!! Form::select('school_id', $schools) !!}

{!! Form::label('Hoeveelheid klassen') !!}
{!! Form::number('quantity') !!}

{!! Form::submit('Nieuwe klassen aanmaken') !!}

{!! Form::close() !!}