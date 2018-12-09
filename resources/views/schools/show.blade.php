{{ $school->name }}
{{ $school->id }}
@foreach($school->classes as $class)
    {{ $class->id }}
    {{ $class->students->count() }}
@endforeach