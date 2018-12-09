{!! Form::model(Consent::class, ['route' => ['consent.create']]) !!}
{!! Form::select('School', $schools); !!} }}

{!! Form::close() !!}