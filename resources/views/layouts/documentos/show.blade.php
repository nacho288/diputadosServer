@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">
        <div class="col col-lg-4">
            
            <div class="row">
                <div class="col">
                    <h4 class="display-4"><strong>Detalles de documento</span></h4>
                     <h3 class="text-secondary">{{  $documento->nombre }}</h3>   
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h4>Descripcion:</h4>
                    <h5 class="text-justify">{{  $documento->descripcion }}</h5>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <a  class="btn btn-dark" href="/documentos/{{  $documento->id }}/edit">Editar</a>
                </div>
                <div class="col text-center">
                    <a  class="btn btn-dark" target="_blank" href="{{  $documento->url }}">descargar</a>
                </div>
                <div class="col text-center">
                    <a  class="btn btn-dark" href="/documentos">Volver</a>
                </div>
            </div>

  




        </div>
    
    </div>
@endauth


@endsection