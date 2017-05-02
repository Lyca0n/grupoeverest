@extends('layouts.admin')

@section('content')
<div class="container">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva propiedad</div>
                <div class="panel-body">
                   {!! Form::open(array('url' => '/admin/listing/save','files'=>true)) !!}
                   {!! Form::token() !!}
                   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nombre')!!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Precio')!!}
                        {!! Form::text('price', old('price'), ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('squaremeters') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Metros Cuadrados')!!}
                        {!! Form::text('squaremeters', old('squaremeters'), ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('buildsquaremeters') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Metros Cuadrados de Construcion')!!}
                        {!! Form::text('buildsquaremeters', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Calle')!!}
                        {!! Form::text('street', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Numero ext')!!}
                        {!! Form::text('number', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('neighbourhood') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Colonia')!!}
                        {!! Form::text('neighbourhood', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Descripcion')!!}
                        {!! Form::textarea('description', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Codigo postal')!!}
                        {!! Form::text('zipcode', null, ['class' => 'form-control' ]) !!}
                   </div>
                    <div class="form-group{{ $errors->has('ltype') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Tipo de propiedad')!!}
                            <select id="ltype" name="ltype" class="form-control" value="{{ old('type') }}">
                                @foreach($ltypes as $type)
                                    <option value="{{$type->id}}" >{{$type->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group{{ $errors->has('otype') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Tipo de operacion')!!}
                            <select id="otype" name="otype" class="form-control" value="{{ old('type') }}">
                                @foreach($otypes as $type)
                                    <option value="{{$type->id}}" >{{$type->name}}</option>
                                @endforeach
                            </select>
                    </div>
                     <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                     {!! Form::label('name', 'Estado')!!}
                             <select id="state" name="state" class="form-control" value="{{ old('state') }}">
                                 @foreach($states as $state)
                                     <option value="{{$state->id}}" >{{$state->name}}</option>
                                 @endforeach
                             </select>
                     </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Ciudad')!!}
                            <select id="city" name="city" class="form-control" value="{{ old('city') }}">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" >{{$city->name}}</option>
                                @endforeach
                            </select>
                    </div>
                   <div class="form-group{{ $errors->has('pictures') ? ' has-error' : '' }}">
                        {!! Form::label('mov', 'Archivo Movimentos')!!}
                        <input type="file" class = "form-control" name="pictures[]" multiple />
                   </div>
                   <div class="form-group">
                       {!! Form::submit('Crear', ['class' => 'btn btn-primary'])!!}
                   </div>

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
