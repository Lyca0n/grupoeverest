@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar estado</div>
                <div class="panel-body">
                   {!! Form::open(array('url' => '/admin/state/update')) !!}
                   {!! Form::token() !!}
                   <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nombre')!!}
                        {!! Form::text('name', $state->name, ['class' => 'form-control' ]) !!}
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
