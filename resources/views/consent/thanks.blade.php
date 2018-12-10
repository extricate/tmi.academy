@extends('layouts.app')

@section('content')
    <header>
    </header>
    <div class="container float-header">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h1>Bedankt!</h1>
                        <p>Fijn dat u de tijd heeft genomen om uw wensen betreffende {{ $student->name }} vast te
                            leggen. Wij zullen uw keuzes respecteren tijdens de workshops. Mocht u nog vragen hebben dan
                            zou u contact op kunnen nemen met <a
                                    href="mailto:contact@tmi.academy">contact@tmi.academy</a>, waar wij u graag verder
                            helpen.</p>
                        <p>
                            Mocht u dat wensen kunnen wij u nog een e-mail sturen waarin de door u gemaakte keuzes zijn
                            vastgelegd. Indien u dat wenst, gelieve hieronder uw e-mailadres in te vullen. Uw
                            e-mailadres slaan wij niet op in onze systemen.
                        </p>
                        {!! Form::open(['route' => ['consent.email', $student]]) !!}
                        <div class="form-inline">
                            <div class="input-group">
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Uw e-mailadres']) !!}
                                <div class="input-group-append">
                                    {!! Form::submit('Verstuur', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection