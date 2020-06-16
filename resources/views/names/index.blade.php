@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Subir archivo</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'names.file', 'method' => 'POST', 'files' => true]) }}
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsFile('file') }}
                                {{ Form::submit('Subir archivo', ['class' => 'btn btn-success btn-sm']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <div class="card-title">Nombres</div>
                    <div class="card-options">
                        <a href="{{ route('names.create') }}" class="btn btn-success btn-sm">Nuevo <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'names.index', 'method' => 'GET']) }}
                        <div class="row">
                            <div class="col-md-6">
                                <input type="search" name="search" class="form-control" placeholder="Buscar nombre">
                            </div>
                        </div>
                    {{ Form::close() }}
                    <div class="table-responsive mt-3">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre completo</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($names as $name)
                                    <tr>
                                        <td>{{ $name->names }}</td>
                                        <td>{{ $name->first_name }}</td>
                                        <td>{{ $name->last_name }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('names.edit', $name->id) }}" class="btn btn-primary btn-sm">Editar <i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No hay registros</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $names->appends([])->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection