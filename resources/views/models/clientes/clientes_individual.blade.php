@extends('layouts.app')

@section('content')

<div class="panel-body">
    @include('common.errors')

    @if (isset($cliente))
    <form action="{{ url('clientes/'.$cliente->id) }}" method="POST" class="form-horizontal">
    @else
    <form action="{{ url('clientes/crear') }}" method="POST" class="form-horizontal">
    @endif

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="nombre" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" name="nombre" id="nombre" class="form-control"
                       value="{{ isset($cliente) ? $cliente->nombre : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="apellido" class="col-sm-3 control-label">Apellido</label>
            <div class="col-sm-6">
                <input type="text" name="apellido" id="apellido" class="form-control"
                       value="{{ isset($cliente) ? $cliente->apellido : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="dni" class="col-sm-3 control-label">DNI</label>
            <div class="col-sm-6">
                <input type="text" name="dni" id="dni" class="form-control"
                       value="{{ isset($cliente) ? $cliente->dni : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="poblacion" class="col-sm-3 control-label">Población</label>
            <div class="col-sm-6">
                <input type="text" name="poblacion" id="poblacion" class="form-control"
                       value="{{ isset($cliente) ? $cliente->poblacion : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="codigo_postal" class="col-sm-3 control-label">Código Postal</label>
            <div class="col-sm-6">
                <input type="text" name="codigo_postal" id="codigo_postal" class="form-control"
                       value="{{ isset($cliente) ? $cliente->codigo_postal : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="telefono" class="col-sm-3 control-label">Telefono</label>
            <div class="col-sm-6">
                <input type="text" name="telefono" id="telefono" class="form-control"
                       value="{{ isset($cliente) ? $cliente->telefono : ''}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                @if (isset($cliente))
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-pencil"></i> Actualizar cliente
                </button>
                @else
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Añadir cliente
                </button>
                @endif
                <a href="{{ url('/clientes') }}" type="submit" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </form>
</div>
@endsection