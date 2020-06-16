@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Editar nombre
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['names.update', $name->id], 'method' => 'PUT']) }}
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsText('names', $name->names) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsText('first_name', $name->first_name) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::bsText('last_name', $name->last_name) }}
                            </div>
                        </div>
                        {{ Form::submit('Actualizar', ['class' => 'btn btn-success']) }}
                        <a href="{{ route('names.index') }}" class="btn btn-dark">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection