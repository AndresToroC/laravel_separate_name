@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Agregar nombre
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'names.store', 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsText('names') }}
                            </div>
                        </div>
                        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
                        <a href="{{ route('names.index') }}" class="btn btn-dark">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection