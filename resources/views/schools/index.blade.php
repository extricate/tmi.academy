@foreach($schools as $school)
    <a href="{{ $school->url() }}">{{ $school->name }}</a> | Leerlingen: {{ $school->students->count() }}
@endforeach

{{ $schools->links() }}

<a class="btn btn-primary" href="{{ route('schools.create') }}">Nieuwe school</a>