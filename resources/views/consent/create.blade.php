@extends('layouts.app')

@section('content')
    <header>
    </header>
    <div class="container float-header">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card mb-3">
                    <div class="card-body">
                        {!! Form::model(['route' => ['toestemming.create']]) !!}
                        <h1>Toestemmingsformulier</h1>
                        <p>
                            Uw kind gaat deelnemen aan workshops over mediawijsheid. Deze lessen worden gegeven door
                            TMI.academy, vanwege onze kennis op het gebied van media en om onze 'jonge' manier van
                            overbrengen. TMI.academy voert deze workshops uit in samenwerking met het Ministerie van
                            Justitie en Veiligheid. De lessen vinden plaats op verschillende scholen en worden gegeven
                            tijdens de lesuren. Om die lessen over media extra kracht bij te zetten,
                            willen we tijdens die lessen ook video's en foto's maken.
                        </p>
                        <p>
                            Indien u daartegen geen bezwaar heeft, wilt u dan het onderstaande formulier invullen?
                        </p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h2>
                            Informatie geportretteerde
                        </h2>
                        <div class="form-group">
                            {!! Form::label('school', 'De geporteretteerde persoon (deelnemer workshop, in veel gevallen uw kind) zit op:') !!}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fal fa-graduation-cap fa-fw"></i></div>
                                </div>
                                {!! Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Kies hier een school', 'required' => 'required']) !!}
                            </div>

                        </div>
                        <div class="form-group">
                            {!! Form::label('student_name', 'Ik geef toestemming namens') !!}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fal fa-child fa-fw"></i></div>
                                </div>
                                {!! Form::text('student_name', null, ['class' => 'form-control', 'placeholder' => 'Typ hier de naam van het de persoon waar u toestemming voor registreert', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <h2 class="mt-4">Toestemming</h2>
                        <div class="form-group">
                            <p>
                                Tijdens de lessen Mediawijsheid worden video's en foto's gemaakt, waarbij mijn kind
                                herkenbaar in beeld wordt gebracht. Ik geef TMI.academy daarvoor toestemming.
                                De foto's en video's die gemaakt zijn bij deze lessen mogen door TMI.academy gebruikt
                                worden in de communicatievormen die ik hieronder heb aangekruist:
                            </p>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('evaluation', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'consent-evaluation',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('consent-evaluation', 'Voor evaluatie doeleinden zodat we de workshops beter kunnen maken', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('class', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'consent-class',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('consent-class', 'Voor de workshops van deze klas', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('school', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'consent-school',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('consent-school', 'Voor de workshops van TMI.academy van deze school', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('other_schools', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'consent-other-schools',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('consent-other-schools', 'Voor de workshops van TMI.academy, ook bij andere scholen en jongerenorganisaties', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('illustrations', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'consent_illustrations',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('consent_illustrations', 'Ter illustratie van het werk van TMI.academy op besloten gelegenheden. Bijvoorbeeld bij presentaties over ons werk of bij gesprekken met andere scholen of instellingen.', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('website', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'consent_website',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('consent_website', 'Op de website en social media van TMI.academy, bijvoorbeeld in een compilatie van video\'s', ['class' => 'form-check-label']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <p>
                                Het Ministerie van Justitie en Veiligheid, die dit project heeft gesubsidieerd, mag deze
                                foto’s en video’s die gemaakt zijn bij deze lessen gebruiken in de communicatievormen
                                die ik hieronder heb aangekruist:
                            </p>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('ministry_evaluation', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'ministry_evaluation',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('ministry_evaluation', 'Voor evaluatie doeleinden zodat de workshops kunnen worden verbeterd.', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('ministry_illustration', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'ministry_illustration',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('ministry_illustration', 'Ter illustratie van de betrokkenheid van het Ministerie van Justitie en veiligheid op besloten gelegenheden. Bijvoorbeeld bij presentaties over deze workshops.', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('ministry_website', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'ministry_website',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('ministry_website', 'Op de website en social media van het Ministerie van Justitie, bijvoorbeeld in een compilatie van video\'s.', ['class' => 'form-check-label']) !!}
                            </div>
                        </div>

                        <h2>Verificatie</h2>
                        <div class="form-group">
                            {!! Form::label('verification', 'Aankruisen wat van toepassing is:') !!}
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('of_age', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'of_age',
                                    'required' => 'required',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                {!! Form::label('of_age', 'Ik ben meerderjarig', ['class' => 'form-check-label']) !!}
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('legal_representative', true, false, array(
                                    'class' => 'mdc-checkbox__native-control',
                                    'id' => 'legal_representative',
                                    'required' => 'required',
                                    )) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
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
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    {!! Form::checkbox('truth', true, false, ['class' => 'mdc-checkbox__native-control', 'required' => 'required', 'id' => 'truth',]) !!}
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path"
                                                  fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
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
    </div>
@endsection