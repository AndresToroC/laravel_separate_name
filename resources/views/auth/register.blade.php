@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col col-login mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="text-center mb-6">
                    <img src="" class="h-7" alt="">
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
                    {{ Form::token() }}
                    {{ Form::bsText('name') }}
                    {{ Form::bsText('email') }}
                    {{ Form::bsPassword('password') }}
                    {{ Form::bsPassword('password_confirmation') }}
                    {{ Form::submit('Registrate', ['class' => 'btn btn-primary btn-block']) }}
                    <a class="btn btn-link" href="{{ route('login') }}">
                        ¿Ya posees una cuenta? Inicia sesión.
                    </a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
