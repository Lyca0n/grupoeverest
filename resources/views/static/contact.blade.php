@extends('layouts.client')
@section('content')

<style>

#map { height: 200px; }

</style>
<div class="container-fluid " >
  <!-- description start -->
  <div class="row step">
    <div class="col-md-4 col-md-offset-1">
        <img src="https://static.pexels.com/photos/42260/business-card-contact-business-cards-business-42260.png" class="img-responsive">
        <br>
        <h2>Visitanos</h2>
        <div id="map"></div>
    </div>
    <div class="col-md-6">
        <blockquote class="blockquote">
            <h2>Contactar a un asesor</h2>
                  {!! Form::open(array('url' => '/inquiry')) !!}
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
<script>
var map = L.map('map').setView([28.624453,-106.083753], 13);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([28.624453, -106.083753]).addTo(map)
    .bindPopup('Everest')
    .openPopup();
</script>
</div>
@stop
