@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
       Fabricas actuales
    </div>

    <div class="panel-body">
        <a href="{{ url('fabricas/crear') }}" class="btn btn-default">
            <i class="fa fa-plus"></i> Crear fabrica
        </a>
        <a href="{{ url('/home') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Volver
        </a>
        <br><br>
        <form action="{{ url('fabricas') }}" method="GET">
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

            <!-- Table Headings -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Propietario</th>
                    <th>DNI</th>
                    <th>Población</th>
                    <th>Código Postal</th>
                    <th>Teléfono</th>
                    <th>Comisión</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($fabricas as $fabrica)
            <tr>
                <td class="table-text">
                    <div>{{ $fabrica->id }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $fabrica->nombre }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $fabrica->propietario }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $fabrica->dni }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $fabrica->poblacion }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $fabrica->codigo_postal }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $fabrica->telefono }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $fabrica->comision }}</div>
                </td>
                <td>
                    <a href="{{ url('fabricas/'.$fabrica->id) }}" class="btn btn-default">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                </td>
                <td>
                    <form action="{{ url('fabricas/'.$fabrica->id) }}" method="POST">
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