@foreach($schools as $school)
    {{ $school->name }} | Leerlingen: {{ $school->students->count() }}
@endforeach

{{ $schools->links() }}

<a class="btn btn-primary" href="{{ route('schools.create') }}">Nieuwe school</a>