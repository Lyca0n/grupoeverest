@extends('layouts.admin')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <h3>Configuracion <small>&raquo; Estados</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/state/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> Nuevo
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <table class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Actualizado</th>
            <th data-sortable="false">Acciones</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($types as $type)
            <tr>
              <td>{{ $type->id}}</td>
              <td>{{ $type->name }}</td>
              <td>
                {{ $type->updated_at }}
              </td>
              <td>
                <a href="/admin/state/edit/{{ $type->id }}"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> Editar
                </a>
                <a href="/admin/state/delete/{{ $type->id }}"
                   class="btn btn-xs btn-danger">
                  <i class="fa fa-minus-circle"></i> Borrar
                </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@stop