@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">
        <div class="col col-lg-4">
            
            <div class="row">
                <div class="col">
                    <h4 class="display-4 font-weight-bold">{{$evento->titulo}}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row ">
                <div class="col">
                    <ul class="m-0">
                        <li>
                            <b>Categorias: </b>@foreach ($evento->categorias as $item)
                                {{$item->nombre}}
                            @endforeach
                        </li>
                        <li>
                            <b>inicia en: </b>{{$evento->desde}}
                        </li>
                        <li>
                            <b>finaliza en: </b>{{$evento->hasta}}
                        </li>
                        <li>
                            <b>Destacada: </b>
                            @if ($evento->destacado == 1)
                                si
                            @else
                                no
                            @endif
                            
                        </li>
                    </ul>
                </div>
                <div class="col text-center">
                    <a class="btn btn-dark" href="/eventos/{{  $evento->id }}/edit">Editar evento</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col text-center">
                    <img class="img-fluid" src="{{$evento->imagen}}" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col text-justify">
                    <h4 class="text-secondary">{{$evento->extracto}}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row">
                
                <div class="col text-justify">
                    <h5>{{$evento->cuerpo}}</h5>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="embed-responsive embed-responsive-16by9 mt-3">
                        <iframe class="embed-responsive-item" src="{{$evento->url_video}}" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center my-3">
                <div class="col text-center">
                    <a class="btn btn-dark" href="/eventos/{{  $evento->id }}/edit">Editar evento</a>
                </div>
                <div class="col text-center">
                    <a href="/eventos" class="btn btn-dark">Volver</a>
                </div>
            </div>




        </div>
    
    </div>
@endauth


@endsection