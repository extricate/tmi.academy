@foreach($consents as $consent)
    {{ $consent->owner->name }} | {{ $consent->owner->school->name }}
    {{ $consent->given }}
@endforeach