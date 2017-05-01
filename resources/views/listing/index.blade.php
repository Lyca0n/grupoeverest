@extends('layouts.client')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Filtros Applicados
        </div>
        <div class="panel-body">
          @foreach($filters as $filter)
          {{ $filter }}<br>
          @endforeach
        </div>
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading">Precio
        </div>
        <div class="panel-body">
                  {!! Form::open(array('method' => 'get')) !!}
                   <div class="form-group{{ $errors->has('pricemin') ? ' has-error' : '' }}">
                        {!! Form::label('pricemin', 'Minimo')!!}
                        {!! Form::text('pricemin', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group{{ $errors->has('pricemax') ? ' has-error' : '' }}">
                        {!! Form::label('pricemax', 'maximo')!!}
                        {!! Form::text('pricemax', null, ['class' => 'form-control' ]) !!}
                   </div>
                   <div class="form-group">
                       {!! Form::submit('Mostrar', ['class' => 'btn btn-primary'])!!}
                   </div>
                   {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-md-9">

    @if($listings->isEmpty())
        <h3>Parece que no hay resultados relacionados con esta busqueda.</h3>
        <a class="btn btn-default" href="/">intentalo de nuevo</a>
    @endif
      @for ($i = 0; $i<=count($listings);)
      <div class="row">
      @if( ! empty($listings[$i]))
      <div class="col-md-4">          
        <div class="panel">
          <!-- Default panel contents -->
          <div class="panel-heading">{{ $listings[0]->name  }}&nbsp;
          <a class="btn btn-info" href="/listing/show/{{ $listings[0]->id }}">Ver</a>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                @if(count($listings[$i]->Pictures)>0)
                <img src="{{'/'.$listings[$i]->Pictures[0]->filename}}" class="img-responsive">
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h4 class="mb-1">Colonia:
                      </h4>
                      <p class="mb-1">{{$listings[$i]->neighbourhood}}
                      </p>
                      <h4 class="mb-1">Metros de terreno:
                      </h4>
                      <p class="mb-1">{{$listings[$i]->squaremeters}}
                      </p>
                      <h4 class="mb-1">Metros de Construcion:
                      </h4>
                      <p class="mb-1">{{$listings[$i]->buildsquaremeters}}
                      </p>
                      <h4 class="mb-1">Precio:
                      </h4>
                      <p class="mb-1">MXN ${{number_format($listings[$i]->price,2)}}
                      </p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        </div>

      </div>
    </div>
    @endif

      @if( ! empty($listings[$i+1]))
      <div class="col-md-4">
        <div class="panel">
          <!-- Default panel contents -->
          <div class="panel-heading">{{ $listings[0]->name  }}
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                @if(count($listings[$i+1]->Pictures)>0)
                <img src="{{'/'.$listings[$i+1]->Pictures[0]->filename}}" class="img-responsive">
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h4 class="mb-1">Colonia:
                      </h4>
                      <p class="mb-1">{{$listings[$i+1]->neighbourhood}}
                      </p>
                      <h4 class="mb-1">Metros de terreno:
                      </h4>
                      <p class="mb-1">{{$listings[$i+1]->squaremeters}}
                      </p>
                      <h4 class="mb-1">Metros de Construcion:
                      </h4>
                      <p class="mb-1">{{$listings[$i+1]->buildsquaremeters}}
                      </p>
                      <h4 class="mb-1">Precio:
                      </h4>
                      <p class="mb-1">MXN ${{number_format($listings[$i+1]->price,2)}}
                      </p>
                    </div>


                  </a>
                </div>
              </div>
            </div>

        </div>
        <!-- List group -->
      </div>
    </div>
    @endif
      @if( ! empty($listings[$i+2]))
      <div class="col-md-4">
        <div class="panel">
          <!-- Default panel contents -->
          <div class="panel-heading">{{ $listings[0]->name  }}
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                @if(count($listings[$i+2]->Pictures)>0)
                <img src="{{'/'.$listings[$i+2]->Pictures[0]->filename}}" class="img-responsive">
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h4 class="mb-1">Colonia:
                      </h4>
                      <p class="mb-1">{{$listings[$i+2]->neighbourhood}}
                      </p>
                      <h4 class="mb-1">Metros de terreno:
                      </h4>
                      <p class="mb-1">{{$listings[$i+2]->squaremeters}}
                      </p>
                      <h4 class="mb-1">Metros de Construcion:
                      </h4>
                      <p class="mb-1">{{$listings[$i+2]->buildsquaremeters}}
                      </p>
                      <h4 class="mb-1">Precio:
                      </h4>
                      <p class="mb-1">MXN ${{number_format($listings[$i+2]->price,2)}}
                      </p>
                    </div>

                  </a>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
    @endif

    </div>
  <a style="display: none">{{$i = $i+3}}</a>
  @endfor
</div>
</div>
</div>
@stop
