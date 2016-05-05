@extends('layouts.app')

@section('content')
<!-- Create Task Form... -->

<!-- Current Tasks -->
<div class="panel panel-default">
    <div class="panel-heading">
        Menú
    </div>

    <div class="panel-body">
        <a href="{{ url('facturas/crear') }}" type="submit" class="btn btn-default">
            <i class="fa fa-cart-plus"></i> Nueva factura
        </a>
        <a href="{{ url('clientes') }}" type="submit" class="btn btn-default">
            <i class="fa fa-user"></i> Administrar Clientes
        </a>
        <a href="{{ url('fabricas') }}" type="submit" class="btn btn-default">
            <i class="fa fa-building"></i> Administrar Fabricas
        </a>
        <br><br>
        <a href="{{ url('facturas') }}?facturas_total=true" type="submit" class="btn btn-default">
            <i class="fa fa-pencil"></i> Administrar todas las Facturas
        </a>
        <a href="{{ url('facturas') }}?facturas_no_pagadas=true" type="submit" class="btn btn-default">
            <i class="fa fa-pencil"></i> Administrar Facturas no pagadas
        </a>
        <a href="{{ url('facturas') }}?facturas_pagadas=true" type="submit" class="btn btn-default">
            <i class="fa fa-pencil"></i> Administrar Facturas pagadas
        </a>
        <br><br>
        <a href="{{ url('/logout') }}" type="submit" class="btn btn-default">
            <i class="fa fa-sign-out"></i> Salir
        </a>
    </div>
</div>
@endsection