@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5  animated fadeIn">
        <div class="col mx-sm-2 mb-4 col-md-8 col-lg-6 px-4 bg-white rounded shadow-sm">
            
            <div class="row mb-0 animated fadeIn fast">
                <div class="col mt-3">
                    <h2 class="blued mb-0">{{$noticia->titulo}}</h2>
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

            @if ($noticia->imagen)
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <img class="img-fluid" src="{{$noticia->imagen}}" alt="">
                </div> 
            </div>
            @endif

            <div class="row mt-3">
                <div class="col">
                    <h5 class="text-justify">{{$noticia->cuerpo}}</h5>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            @if ($noticia->url_video)
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
            @endif

            <div class="row align-items-center">
                <div class="col-12 col-md-4">
                    <ul class="m-0 listText">
                        <li>
                            <b>Categorias: </b>@foreach ($noticia->categorias as $item)
                                {{$item->nombre}}
                            @endforeach
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
                <div class="col-12 col-md-4">
                    <ul class="m-0 listText">
                        <li>
                            <b>inicia en: </b>{{$noticia->desde}}
                        </li>
                        <li>
                            <b>finaliza en: </b>{{$noticia->hasta}}
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a class="btn btnColor" href="/noticias/{{  $noticia->id }}/edit">Editar noticia</a>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center my-3">
                <div class="col text-center">
                    <a href="/noticias" class="btn btnColor">Volver</a>
                </div>
            </div>

        </div>
    
    </div>
@endauth


@endsection