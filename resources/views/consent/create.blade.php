@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    {!! Form::model(['route' => ['toestemming.create']]) !!}
                    <h1>Toestemmingsformulier</h1>
                    <p>
                        Uw kind gaat deelnemen aan workshops over mediawijsheid. Deze lessen worden gegeven door
                        TMI.academy, vanwege onze kennis op het gebied van media en om onze 'jonge' manier van
                        overbrengen. TMI.academy voert deze workshops uit in samenwerking met het Ministerie van
                        Justitie en Veiligheid. De lessen vinden plaats op het Globe College en wordt gegeven
                        tijdens de lesuren. Om die lessen over media extra kracht bij te zetten,
                        willen we tijdens die lessen ook video's en foto's maken.
                    </p>
                    <p>
                        Indien u daartegen geen bezwaar heeft, wilt u dan het onderstaande formulier invullen?
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h2>Informatie geportretteerde</h2>
                    <div class="form-group">
                        {!! Form::label('school', 'De geporteretteerde persoon (deelnemer workshop, in veel gevallen uw kind) zit op:') !!}
                        {!! Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Kies hier een school', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('student_name', 'Ik geef toestemming namens') !!}
                        {!! Form::text('student_name', null, ['class' => 'form-control', 'placeholder' => 'Typ hier de naam van het de geportretteerde persoon waar u toestemming voor wil registreren', 'required' => 'required']) !!}
                    </div>

                    <h2>Toestemming</h2>
                    <div class="form-group">
                        {!! Form::label('consent',
                        'Tijdens de lessen Mediawijsheid worden video\'s en foto\'s gemaakt, waarbij mijn kind
                        herkenbaar in beeld wordt gebracht. Ik geef TMI.academy daarvoor toestemming.
                        De foto\'s en video\'s die gemaakt zijn bij deze lessen mogen door TMI.academy gebruikt worden in de
                        communicatievormen die ik hieronder heb aangekruist:
        ') !!}
                        <div class="form-check">
                            {!! Form::checkbox('evaluation', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'consent-evaluation',
                            )) !!}
                            {!! Form::label('consent-evaluation', 'Voor evaluatie doeleinden zodat we de workshops beter kunnen maken', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::checkbox('class', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'consent-class',
                            )) !!}
                            {!! Form::label('consent-class', 'Voor de workshops van deze klas', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::checkbox('school', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'consent-school',
                            )) !!}
                            {!! Form::label('consent-school', 'Voor de workshops van TMI.academy van deze school', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::checkbox('other_schools', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'consent-other-schools',
                            )) !!}
                            {!! Form::label('consent-other-schools', 'Voor de workshops van TMI.academy, ook bij andere scholen en jongerenorganisaties', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::checkbox('illustrations', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'consent_illustrations',
                            )) !!}
                            {!! Form::label('consent_illustrations', 'Ter illustratie van het werk van TMI.academy op besloten gelegenheden. Bijvoorbeeld bij presentaties over ons werk of bij gesprekken met andere scholen of instellingen.', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::checkbox('website', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'consent_website',
                            )) !!}
                            {!! Form::label('consent_website', 'Op de website en social media van TMI.academy, bijvoorbeeld in een compilatie van video\'s', ['class' => 'form-check-label']) !!}
                        </div>
                    </div>

                    <h3>Aanvullende toestemming</h3>
                    <div class="form-group">
                        {!! Form::label('consent-ministry', 'Het Ministerie van Justitie en Veiligheid, die dit project heeft gesubsidieerd, mag deze foto’s en video’s die gemaakt zijn bij deze lessen gebruiken in de communicatievormen die ik hieronder heb aangekruist:
                ') !!}
                        <div class="form-check">
                            {!! Form::checkbox('ministry_evaluation', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'ministry_evaluation',
                            )) !!}
                            {!! Form::label('ministry_evaluation', 'Voor evaluatie doeleinden zodat de workshops kunnen worden verbeterd.', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::checkbox('ministry_illustration', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'ministry_illustration',
                            )) !!}
                            {!! Form::label('ministry_illustration', 'Ter illustratie van de betrokkenheid van het Ministerie van Justitie en veiligheid op besloten gelegenheden. Bijvoorbeeld bij presentaties over deze workshops.', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::checkbox('ministry_website', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'ministry_website',
                            )) !!}
                            {!! Form::label('ministry_website', 'Op de website en social media van het Ministerie van Justitie, bijvoorbeeld in een compilatie van video\'s.', ['class' => 'form-check-label']) !!}
                        </div>
                    </div>

                    <h2>Verificatie</h2>
                    <div class="form-group">
                        {!! Form::label('verification', 'Aankruisen wat van toepassing is:') !!}
                        <div class="form-check">
                            {!! Form::checkbox('of_age', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'of_age',
                            'required' => 'required',
                            )) !!}
                            {!! Form::label('of_age', 'Ik ben meerderjarig', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::checkbox('legal_representative', true, false, array(
                            'class' => 'form-check-input',
                            'id' => 'legal_representative',
                            'required' => 'required',
                            )) !!}
                            {!! Form::label('legal_representative', 'De "geportretteerde persoon" (de deelnemer aan de workshop) is minderjarig. Ik ben de wettelijke vertegenwoordiger en zal deze verklaring (mede) ondertekenen', ['class' => 'form-check-label']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <p>
                            Deze toestemming is geldig voor vijf jaar en geldt voor foto’s en video’s die door
                            TMI.academy,
                            of in diens opdracht worden gemaakt.
                        </p>
                    </div>

                    <div class="form-group">
                        {!! Form::label('consenter_name', 'Getekend wettelijke vertegenwoordiger') !!}
                        {!! Form::text('consenter_name', null, ['class' => 'form-control', 'placeholder' => 'Typ hier uw naam', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('date', 'Datum van ondertekening') !!}
                        {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'disabled' => 'disabled']); !!}
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            {!! Form::checkbox('truth', true, false, ['class' => 'form-check-input', 'required' => 'required', 'id' => 'truth',]) !!}
                            {!! Form::label('truth', 'Ik verklaar bovenstaande naar waarheid te hebben ingevuld', ['class' => 'form-check-label']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Toestemming registreren', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection