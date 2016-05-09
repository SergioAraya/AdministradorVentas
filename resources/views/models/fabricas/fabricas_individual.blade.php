@extends('layouts.app')

@section('content')

<div class="panel-body">
    @if (isset($fabrica))
    <form action="{{ url('fabricas/'.$fabrica->id) }}" method="POST" class="form-horizontal">
    @else
    <form action="{{ url('fabricas/crear') }}" method="POST" class="form-horizontal">
    @endif

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="nombre" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" name="nombre" id="nombre" class="form-control"
                       value="{{ isset($fabrica) ? $fabrica->nombre : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="propietario" class="col-sm-3 control-label">Propietario</label>
            <div class="col-sm-6">
                <input type="text" name="propietario" id="propietario" class="form-control"
                       value="{{ isset($fabrica) ? $fabrica->propietario : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="dni" class="col-sm-3 control-label">DNI</label>
            <div class="col-sm-6">
                <input type="text" name="dni" id="dni" class="form-control"
                       value="{{ isset($fabrica) ? $fabrica->dni : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="poblacion" class="col-sm-3 control-label">Población</label>
            <div class="col-sm-6">
                <input type="text" name="poblacion" id="poblacion" class="form-control"
                       value="{{ isset($fabrica) ? $fabrica->poblacion : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="codigo_postal" class="col-sm-3 control-label">Código Postal</label>
            <div class="col-sm-6">
                <input type="text" name="codigo_postal" id="codigo_postal" class="form-control"
                       value="{{ isset($fabrica) ? $fabrica->codigo_postal : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="telefono" class="col-sm-3 control-label">Telefono</label>
            <div class="col-sm-6">
                <input type="text" name="telefono" id="telefono" class="form-control"
                       value="{{ isset($fabrica) ? $fabrica->telefono : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="comision" class="col-sm-3 control-label">Comisión (%)</label>
            <div class="col-sm-6">
                <input type="number" name="comision" min="0" max="100" id="comision" class="form-control"
                       value="{{ isset($fabrica) ? $fabrica->comision : ''}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                @if (isset($fabrica))
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-pencil"></i> Actualizar fabrica
                </button>
                @else
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Añadir fabrica
                </button>
                @endif
                <a href="{{ url('/fabricas') }}" type="submit" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </form>
</div>
@endsection