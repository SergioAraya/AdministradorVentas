@extends('layouts.app')

@section('content')

<div class="panel-body">
    @include('common.errors')

    @if (isset($factura))
    <form action="{{ url('facturas/'.$factura->id) }}" method="POST" class="form-horizontal">
    @else
    <form action="{{ url('facturas/crear') }}" method="POST" class="form-horizontal">
    @endif

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="cliente_id" class="col-sm-3 control-label">Cliente</label>
            <div class="col-sm-6">
                <select class="form-control" id="cliente_id" name="cliente_id">
                    @foreach ($clientes as $cliente)
                        @if (isset($factura) && $cliente->id == $factura->cliente_id)
                        <option value="{{ $cliente->id }}" selected>
                        @else
                        <option value="{{ $cliente->id }}">
                        @endif
                            {{ $cliente->nombre }} {{ $cliente->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="fabrica_id" class="col-sm-3 control-label">Fabrica</label>
            <div class="col-sm-6">
                <select class="form-control" id="fabrica_id" name="fabrica_id">
                    @foreach ($fabricas as $fabrica)
                    @if (isset($factura) && $fabrica->id == $factura->fabrica_id)
                    <option value="{{ $fabrica->id }}" selected>
                        @else
                    <option value="{{ $fabrica->id }}">
                        @endif
                        {{ $fabrica->nombre }} ({{ $fabrica->propietario }})
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="importe" class="col-sm-3 control-label">Importe</label>
            <div class="col-sm-6">
                <input type="number" step="0.01" name="importe" id="importe" class="form-control"
                       value="{{ isset($factura) ? $factura->importe : ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="pagado" class="col-sm-3 control-label">Pagado</label>
            <div class="col-sm-6">
                <input type="checkbox" name="pagado" id="pagado" class="form-control"
                       {{ isset($factura) ? ($factura->pagado ? 'checked' : '') : ''}}>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                @if (isset($factura))
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-pencil"></i> Actualizar factura
                </button>
                @else
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Añadir factura
                </button>
                @endif
                <a href="{{ url('/facturas') }}" type="submit" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </form>
</div>
@endsection