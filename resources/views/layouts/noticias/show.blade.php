@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">
        <div class="col col-lg-4">
            
            <div class="row">
                <div class="col">
                    <h4 class="display-4 font-weight-bold">{{$noticia->titulo}}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col">
                    <ul class="m-0">
                        <li>
                            <b>Categorias: </b>@foreach ($noticia->categorias as $item)
                                {{$item->nombre}}
                            @endforeach
                        </li>
                        <li>
                            <b>inicia en: </b>{{$noticia->desde}}
                        </li>
                        <li>
                            <b>finaliza en: </b>{{$noticia->hasta}}
                        </li>
                        <li>
                            <b>Destacada: </b>
                            @if ($noticia->destacado == 1)
                                si
                            @else
                                no
                            @endif
                            
                        </li>
                    </ul>
                </div>
                <div class="col text-center">
                    <a class="btn btn-dark" href="/noticias/{{  $noticia->id }}/edit">Editar noticia</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <img class="img-fluid" src="{{$noticia->imagen}}" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col text-justify">
                    <h4 class="text-secondary">{{$noticia->extracto}}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row">
                
                <div class="col text-justify">
                    <h5>{{$noticia->cuerpo}}</h5>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="embed-responsive embed-responsive-16by9 mt-3">
                        <iframe class="embed-responsive-item" src="{{$noticia->url_video}}" allowfullscreen></iframe>
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
                    <a class="btn btn-dark" href="/noticias/{{  $noticia->id }}/edit">Editar noticia</a>
                </div>
                <div class="col text-center">
                    <a href="/noticias" class="btn btn-dark">Volver</a>
                </div>
            </div>




        </div>
    
    </div>
@endauth


@endsection