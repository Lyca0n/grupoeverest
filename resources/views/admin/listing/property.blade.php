@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <h3>Propiedades 
        <small>&raquo; Agregar propiedades
        </small>
      </h3>
    </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <ul class="list-group">
        @foreach($listing->properties as $property)
        <li class="list-group-item"> {{$property->value}} &nbsp; {{$property->propertyType->name}}
        </li>
        @endforeach
      </ul>
    </div>
    <div class="col-md-6">
      {!! Form::open(array('url' => '/admin/listing/propertiesstore/'.$listing->id,'files'=>true)) !!}
      {!! Form::token() !!}

      <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
        {!! Form::label('value', 'Valor')!!}
        {!! Form::text('value', null, ['class' => 'form-control' ]) !!}
      </div>

      <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        <select id="type" name="type" class="form-control" value="{{ old('type') }}">
          @foreach($types as $type)
          <option value="{{$type->id}}" >{{$type->name}}</option>
          @endforeach
        </select>
      </div>
        <div class="form-group">
          {!! Form::submit('Añadir', ['class' => 'btn btn-primary'])!!}
        </div>
        <a href="{{route('listing.index')}}" class="btn btn-primary">Terminar</a>
      {!! Form::close() !!}
    </div>

  </div>
</div>
@stop
