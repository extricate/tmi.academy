@extends('layouts.app')

@section('content')
    <header>

    </header>
    <div class="container float-header">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @admin
                            <p>
                                <b>Je bent ingelogd als beheerder.</b>
                            </p>

                            <passport-clients></passport-clients>
                            <passport-authorized-clients></passport-authorized-clients>
                            <passport-personal-access-tokens></passport-personal-access-tokens>
                            @endadmin
                        <p>Welkom bij de TMI Privacy tool.</p>

                        <a href="{{ route('consent.create') }}" class="btn btn-primary">Naar toestemmingsformulier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
