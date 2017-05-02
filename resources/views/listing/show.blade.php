@extends('......layouts.client')
@section('content')
<div class="container-fluid">
@if(Session::has('flash_message'))
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h2><span class="label label-warning">{{Session::get('flash_message')}}</span></h2>
    </div>
  </div>
@endif
  <div class="row">
    <div class="col-md-5 col-md-offset-1">

      <h2><span class="label label-info">{{$listing->name}}</span></h2>
    </div>
    <div class="col-md-5 text-right">
    <h3><a href="#" class="label label-success"onclick="window.history.back()">Regresar</a></h3>

    </div>
  </div>
  <div class="row">
    <div class="col-md-7 col-md-offset-1">
      <div id="Carousel" class="carousel slide"  data-interval="3000" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#Carousel" data-slide-to="0" class="active"></li>
      <li data-target="#Carousel" data-slide-to="1"></li>
      <li data-target="#Carousel" data-slide-to="2"></li>
    </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
          @foreach($listing->Pictures as $key=>$picture)
          @if($key==0)
          <div class="active item">
            @else
            <div class=" item">
              @endif
              <img src="{{'/'.$picture->filename}}" class="img-responsive">
            </div>
            @endforeach
          </div>

        </div>
      </div>
      <div class="col-md-3">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h4 class="mb-1">Precio:
              </h4>
              <p class="mb-1">MXN &nbsp; ${{number_format($listing->price,2)}}
              </p>
              <h4 class="mb-1">Metros de terreno:
              </h4>
              <p class="mb-1">{{ $listing->squaremeters }}
              </p>
              <h4 class="mb-1">Metros de Construcion:
              </h4>
              <p class="mb-1">{{ $listing->buildsquaremeters }}
              </p>
              <h4 class="mb-1">Colonia:
              </h4>
              <p class="mb-1">{{ $listing->neighbourhood }}
              </p>
              <h4 class="mb-1">Detalles:
              </h4>
              <p class="mb-1">{{ $listing->description }}
              </p>
            </div>
            </p>
          </a>
      </div>
    </div>
  </div>
</div>
<div class="row step">
    <div class="col-md-5 col-md-offset-1">
        <h3>Mas Detalles</h3>
        <ul class="list-group">
          @foreach($listing->properties as $property)
          <li class="list-group-item"> {{$property->value}} &nbsp; {{$property->propertyType->name}}
          </li>
          @endforeach
        </ul>
    </div>
    <div class="col-md-5">
        <blockquote class="blockquote">
            <h2>Deseo mas Información</h2>
                  {!! Form::open(array('url' => '/inquiry/'.$listing->id)) !!}
                   {!! Form::token() !!}
                   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nombre')!!}
                        {!! Form::text('name', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {!! Form::label('phone', 'Telefono')!!}
                        {!! Form::text('phone', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Correo Electronico')!!}
                        {!! Form::text('email', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::label('description', 'Mensaje')!!}
                        {!! Form::textarea('description', null, ['class' => 'form-control' ]) !!}
                   </div>

                   <div class="form-group">
                       {!! Form::submit('Enviar', ['class' => 'btn btn-primary'])!!}
                   </div>

                   {!! Form::close() !!}
        </blockquote>
    </div>
</div>
</div>
@stop
