{!! Form::model($schools, ['method' => 'POST', 'action' => ['SchoolController@store']]) !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::label('Naam van de school') !!}
{!! Form::text('name') !!}
{!! Form::submit('Nieuwe school aanmaken') !!}

{!! Form::close() !!}