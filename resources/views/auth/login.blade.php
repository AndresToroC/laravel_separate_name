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
                {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                    {{ Form::token() }}
                    {{ Form::bsText('email', null, ['autofocus' => 'autofocus']) }}
                    {{ Form::bsPassword('password') }}
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" />
                            <span class="custom-control-label">Recuerdame</span>
                        </label>
                    </div>
                    {{ Form::submit('Iniciar sesión', ['class' => 'btn btn-primary btn-block']) }}
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            ¿Olvidó su contraseña?
                        </a>
                    @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
