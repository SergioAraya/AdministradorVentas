@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
       Clientes actuales
    </div>

    <div class="panel-body">
        <a href="{{ url('clientes/crear') }}" class="btn btn-default">
            <i class="fa fa-plus"></i> Crear cliente
        </a>
        <a href="{{ url('/home') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Volver
        </a>
        <br><br>
        <form action="{{ url('clientes') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="nombrequery" placeholder="Nombre...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">
                  <i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <table class="table table-striped task-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Población</th>
                    <th>Código Postal</th>
                    <th>Teléfono</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td class="table-text">
                    <div>{{ $cliente->id }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $cliente->nombre }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $cliente->apellido }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $cliente->dni }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $cliente->poblacion }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $cliente->codigo_postal }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $cliente->telefono }}</div>
                </td>
                <td>
                    <a href="{{ url('clientes/'.$cliente->id) }}" class="btn btn-default">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                </td>
                <td>
                    <form action="{{ url('clientes/'.$cliente->id) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection