{{ $school->name }}
{{ $school->id }}
@foreach($school->classes as $class)
    {{ $class->id }}
    {{ $class->students->count() }}
@endforeach

<a href="/klassen/nieuw" class="btn btn-primary">Nieuwe klas</a>