@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::model(['route' => ['toestemming.create']]) !!}

            <div class="form-group">
                {!! Form::label('school', 'Mijn kind zit op') !!}
                {!! Form::select('school', $schools, null, ['class' => 'form-control', 'placeholder' => 'Kies hier een school']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('student_name', 'Ik geef toestemming voor') !!}
                {!! Form::text('student_name', null, ['class' => 'form-control', 'placeholder' => 'Typ hier de naam van het kind waar u toestemming voor wil registreren']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('consent', 'Ik geef toestemming voor') !!}
                <div class="form-check">
                    {!! Form::checkbox('consent', 'evaluation', false, array(
                    'class' => 'form-check-input',
                    'id' => 'consent-evaluation',
                    )) !!}
                    {!! Form::label('consent-evaluation', 'Voor evaluatie doeleinden zodat we de workshops beter kunnen maken', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('consent', 'class', false, array(
                    'class' => 'form-check-input',
                    'id' => 'consent-class',
                    )) !!}
                    {!! Form::label('consent-class', 'Voor de workshops van deze klas', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('consent', 'school', false, array(
                    'class' => 'form-check-input',
                    'id' => 'consent-school',
                    )) !!}
                    {!! Form::label('consent-school', 'Voor de workshops van TMI.academy van deze school', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('consent', 'other-schools', false, array(
                    'class' => 'form-check-input',
                    'id' => 'consent-other-schools',
                    )) !!}
                    {!! Form::label('consent-other-schools', 'Voor de workshops van TMI.academy, ook bij andere scholen en jongerenorganisaties', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('consent', 'illustrations', false, array(
                    'class' => 'form-check-input',
                    'id' => 'consent-illustrations',
                    )) !!}
                    {!! Form::label('consent-illustrations', 'Ter illustratie van het werk van TMI.academy op besloten gelegenheden. Bijvoorbeeld bij presentaties over ons werk of bij gesprekken met andere scholen of instellingen.', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('consent', 'website', false, array(
                    'class' => 'form-check-input',
                    'id' => 'consent-website',
                    )) !!}
                    {!! Form::label('consent-website', 'Op de website en social media van TMI.academy, bijvoorbeeld in een compilatie van video\'s', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('consent-ministry', 'Het Ministerie van Justitie en Veiligheid, die dit project heeft gesubsidieerd, mag deze foto’s en video’s die gemaakt zijn bij deze lessen gebruiken in de communicatievormen die ik hieronder heb aangekruist:
        ') !!}
                <div class="form-check">
                    {!! Form::checkbox('consent-ministry', 'ministry-evaluation', false, array(
                    'class' => 'form-check-input',
                    'id' => 'ministry-evaluation',
                    )) !!}
                    {!! Form::label('ministry-evaluation', 'Voor evaluatie doeleinden zodat de workshops kunnen worden verbeterd.', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('consent-ministry', 'ministry-illustration', false, array(
                    'class' => 'form-check-input',
                    'id' => 'ministry-illustration',
                    )) !!}
                    {!! Form::label('ministry-illustration', 'Ter illustratie van de betrokkenheid van het Ministerie van Justitie en veiligheid op besloten gelegenheden. Bijvoorbeeld bij presentaties over deze workshops.', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('consent-ministry', 'ministry-website', false, array(
                    'class' => 'form-check-input',
                    'id' => 'ministry-website',
                    )) !!}
                    {!! Form::label('ministry-website', 'Op de website en social media van het Ministerie van Justitie, bijvoorbeeld in een compilatie van video\'s.', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('verification', 'Aankruisen wat van toepassing is:') !!}
                <div class="form-check">
                    {!! Form::checkbox('verification', 'of-age', false, array(
                    'class' => 'form-check-input',
                    'id' => 'of-age',
                    'required' => 'required',
                    )) !!}
                    {!! Form::label('of-age', 'Ik ben meerderjarig', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('verification', 'legal-representative', false, array(
                    'class' => 'form-check-input',
                    'id' => 'legal-representative',
                    'required' => 'required',
                    )) !!}
                    {!! Form::label('legal-representative', 'De "geportretteerde persoon" (de deelnemer aan de workshop) is minderjarig. Ik ben de wettelijke vertegenwoordiger en zal deze verklaring (mede) ondertekenen', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <div class="form-group">
                <p>
                    Deze toestemming is geldig voor vijf jaar en geldt voor foto’s en video’s die door TMI.academy,
                    of in diens opdracht worden gemaakt.
                </p>
            </div>

            <div class="form-group">
                {!! Form::label('date', 'Datum van ondertekening') !!}
                {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'disabled' => 'disabled']); !!}
            </div>

            <div class="form-group">
                {!! Form::label('consenter_name', 'Getekend wettelijke vertegenwoordiger') !!}
                {!! Form::text('consenter_name', null, ['class' => 'form-control', 'placeholder' => 'Typ hier uw naam']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Toestemming registreren', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection