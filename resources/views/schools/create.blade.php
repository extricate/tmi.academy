{!! Form::model($schools, ['method' => 'POST', 'action' => ['SchoolController@store']]) !!}

{!! Form::label('Naam van de school') !!}
{!! Form::text('name') !!}
{!! Form::submit('Nieuwe school aanmaken') !!}

{!! Form::close() !!}