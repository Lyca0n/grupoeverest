@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Cliente</div>
                <div class="panel-body">
                   {!! Form::open(array('url' => '/client/update/'.$client->id)) !!}
                   {!! Form::token() !!}
                   <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                        {!! Form::label('company_name', 'Razón Social')!!}
                        {!! Form::text('company_name', $client->company_name, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
                        {!! Form::label('rfc', 'RFC')!!}
                        {!! Form::text('rfc', $client->rfc , ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                        {!! Form::label('contact', 'Contacto')!!}
                        {!! Form::text('contact', $client->contact, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Correo Electroníco')!!}
                        {!! Form::email('email', $client->email, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {!! Form::label('phone', 'Teléfono')!!}
                        {!! Form::text('phone', $client->phone, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group">
                       {!! Form::submit('Actualizar', ['class' => 'btn btn-primary'])!!}
                   </div>
                   {!! Form::close() !!}
                   <h5>Borrar registros</h5>
                    @foreach($client->patronages as $patronage)
                        <a class="btn btn-xs btn-danger" href="/patronage/delete/{{$patronage->id}}"><i class="fa fa-delete"></i>
                        {{$patronage->patronage}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
