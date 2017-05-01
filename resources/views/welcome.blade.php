@extends('layouts.client')
@section('content')
<div class="container-fluid " >
  <div class="row portrait" style="min-height:30em;">

        <div class="col-md-5 col-md-offset-3" style="margin-top: 12em; border-radius: 10px 10px 10px 10px; padding-left: 3px; padding-right: 3px; padding-bottom: 5px; padding-top: 5px;  background-color:#0c1a1e;">
        <div>
        <h3 style="color: #d4d4d4">Encuentra tu hogar ideal</h3>
          <form class="form-inline" id="search">
            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">

              <select id="ltype" name="ltype" class="form-control" value="{{ old('type') }}">
                @foreach($ltypes as $type)
                <option value="{{$type->name}}" >{{$type->name}}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
              <select id="otype" name="otype" class="form-control" value="{{ old('type') }}">
                @foreach($otypes as $type)
                <option value="{{$type->name}}" >{{$type->name}}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
              <select id="state" name="state" class="form-control" placeholder="Estado" value="{{ old('state') }}">
              <option value="" disabled selected>Estado</option>
                @foreach($states as $state)
                <option value="{{$state->name}}" >{{$state->name}}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
              <select id="city" name="city" class="form-control" value="{{ old('city') }}">
                <option value="" disabled selected>Ciudad</option>
                @foreach($cities as $city)
                <option value="{{$city->name}}" >{{$city->name}}
                </option>
                @endforeach
              </select>
            </div>
            <button type="submit"  class="btn btn-info">Buscar
            </button>
          </form>
        </div>
        </div>

  </div>
  <!-- description start -->
  <div class="row step">
    <div class="col-md-4 col-md-offset-1">
        <img src="https://static.pexels.com/photos/261146/pexels-photo-261146.jpeg" class="img-responsive ">
    </div>
    <div class="col-md-6">
        <blockquote class="blockquote">
            <h2>Nosotros</h2>
          <p class="mb-0">
                Somos una empresa chihuahuense dedicada al ramo inmobiliario con más de 23 años de experiencia, tiempo en el que nos hemos desempeñado con gran profesionalismo y ética, hecho que ha resultado en la amplia confianza de nuestros clientes.
          </p>
        </blockquote>
    </div>
  </div>
  <div class="row step">
    <div class="col-md-6 col-md-offset-1">
        <blockquote class="blockquote">
            <h2>Servicios</h2>
          <p class="mb-0">
            <ul class="list-group">
              <li class="list-group-item">Comercialización y arrendamiento de bienes inmuebles</li>
              <li class="list-group-item"> Valuación</li>
              <li class="list-group-item">Consultoría inmobiliaria</li>
              <li class="list-group-item">Asesoría jurídica</li>
              <li class="list-group-item">Gestión y trámites</li>
            </ul>
          </p>
        </blockquote>
    </div>
    <div class="col-md-4 ">
        <img src="https://static.pexels.com/photos/101808/pexels-photo-101808.jpeg" class="img-responsive ">
    </div>

  </div>
</div>
<script>
$( "#search" ).submit(function( event ) {
  event.preventDefault();
 window.location.href ="/search"+"/"+$('#ltype option:selected').val()+"/"+$('#otype option:selected').val()+"/"+$('#state option:selected').val()+"/"+$('#city option:selected').val();
});
</script>
@stop
