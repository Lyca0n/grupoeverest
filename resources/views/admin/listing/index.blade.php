@extends('......layouts.admin')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <h3>Propiedades <small>&raquo; Listado de propiedades</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/listing/create" class="btn btn-success btn-md">
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
            <th>Precio</th>
            <th>Metros cuadrados</th>
            <th>Numero int</th>
            <th>Calle</th>
            <th>Colonia</th>
            <th>Descripcion</th>
            <th>Codigo postal</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Tipo de operacion</th>
            <th>Tipo de listado</th>
            <th>Archivos</th>
            <th>Actualizado</th>
            <th data-sortable="false">Acciones</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($listings as $listing)
            <tr>
              <td>{{ $listing->id}}</td>
              <td>{{ $listing->name }}</td>
              <td>{{ $listing->price }}</td>
              <td>{{ $listing->squaremeters }}</td>
              <td>{{ $listing->number }}</td>
              <td>{{ $listing->street }}</td>
              <td>{{ $listing->neighbourhood }}</td>
              <td>{{ str_limit($listing->description, 70) }}</td>
              <td>{{ $listing->zipcode }}</td>
              <td>{{ $listing->longitude }}</td>
              <td>{{ $listing->latitude }}</td>
              <td>
              @if ($listing->operationType)
              {{$listing->operationType->name}}
              @endif
              </td>
              <td>
              @if ($listing->listingType)
              {{$listing->listingType->name}}
              @endif
              </td>
              <td>
              @if ($listing->Pictures)
                    {{count($listing->Pictures)}}
              @endif
              </td>
              <td>
                {{ $listing->updated_at }}
              </td>
              <td>
                <a href="/admin/listing/edit/{{ $listing->id }}"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> Editar
                </a>
                <a href="/admin/listing/properties/{{ $listing->id }}"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> Editar propiedades
                </a>
                <a href="/admin/listing/delete/{{ $listing->id }}"
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