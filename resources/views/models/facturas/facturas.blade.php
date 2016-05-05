@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
       Facturas actuales
    </div>

    <div class="panel-body">
        <a href="{{ url('facturas/crear') }}" class="btn btn-default">
            <i class="fa fa-plus"></i> Crear factura
        </a>
        <a href="{{ url('/home') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Volver
        </a>
        <br><br>
        <form action="{{ url('facturas') }}" method="GET">
            <button type="submit" name="facturas_total" value="true"
                    class="btn btn-default {{ $tipoPeticion == 'facturas_total' ? 'active' : '' }}">
                <i class="fa fa-globe"></i> Ver todas las Facturas
            </button>
            <button type="submit" name="facturas_no_pagadas" value="true"
                    class="btn btn-default {{ $tipoPeticion == 'facturas_no_pagadas' ? 'active' : '' }}">
                <i class="fa fa-exclamation-triangle"></i> Ver Facturas no pagadas
            </button>
            <button type="submit" name="facturas_pagadas" value="true"
                    class="btn btn-default {{ $tipoPeticion == 'facturas_pagadas' ? 'active' : '' }}">
                <i class="fa fa-money"></i> Ver Facturas pagadas
            </button>
        </form>
        <br>

        <!-- TODO BUSCAR -->
        <table class="table table-striped task-table">

            <!-- Table Headings -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Fabrica</th>
                    <th>Importe Beneficio</th>
                    <th>Pagado</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($facturas as $factura)
            <tr>
                <td class="table-text">
                    <div>{{ $factura->id }}</div>
                </td>
                <td class="table-text">
                    <a href="{{ url('clientes/'.$factura->cliente->id) }}">
                        <div>{{ $factura->cliente->nombre }} {{ $factura->cliente->apellido }}</div>
                    </a>
                </td>
                <td class="table-text">
                    <a href="{{ url('fabricas/'.$factura->fabrica->id) }}">
                        <div>{{ $factura->fabrica->nombre }} ({{ $factura->fabrica->propietario }})</div>
                    </a>
                </td>
                <td class="table-text">
                    <div>{{ $factura->importe_beneficio }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $factura->pagado ? 'Sí' : 'No' }}</div>
                </td>
                <td>
                    <a href="{{ url('facturas/'.$factura->id) }}" class="btn btn-default">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                </td>
                <td>
                    <form action="{{ url('facturas/'.$factura->id) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td><b>TOTAL:</b></td>
                <td colspan="2"></td>
                <td colspan="4"><b>{{ $total }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection