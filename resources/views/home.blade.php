@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>


                <div class="panel-body">
        <ul class="list-group">
          @foreach($inquiries  as $inquiry)
          <li class="list-group-item">
            <h5>{{$inquiry->name}}</h5>
          <span>Email: {{$inquiry->email}}</span><br>
          <span>Telefono: {{$inquiry->phone}}</span><br>
          <span>Mensaje: {{$inquiry->message}}</span><br>
          @if($inquiry->listing)
                <a href="/listing/show/{{ $inquiry->listing->id }}"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> Propiedad
                </a>
          @endif
          <span>{{$inquiry->createdat}}</span>
                <a href="/inquiry/delete/{{ $inquiry->id }}"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> Borrar
                </a>
          </li>
          @endforeach
        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
