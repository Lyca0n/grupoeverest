@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar ciudad</div>
                <div class="panel-body">
                   {!! Form::open(array('url' => '/admin/city/update/'.$city->id)) !!}
                   {!! Form::token() !!}
                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Estado')!!}
                            <select id="state" name="state" class="form-control" value="{{$state->id }}">
                                @foreach($states as $state)
                                    <option value="{{$state->id}}" >{{$state->name}}</option>
                                @endforeach
                            </select>
                    </div>
                   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nombre')!!}
                        {!! Form::text('name', $city->name, ['class' => 'form-control' ]) !!}
                   </div>

                   <div class="form-group">
                       {!! Form::submit('Guardar', ['class' => 'btn btn-primary'])!!}
                   </div>

                   {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
