@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">
        <div class="col col-md-6 col-lg-4 bg-white rounded shadow-sm">
            
            <div class="row">
                <div class="col mt-3">
                    <h2 class="blued mb-0">{{  $documento->nombre }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            @if ($documento->descripcion)
            <div class="row">
                <div class="col">
                    <h5 class="text-justify">{{  $documento->descripcion }}</h5>
                </div>
            </div>
            @else
                <div class="row mt-3 mb-3">
                    <div class="col text-center">
                        <h4 class="text-secondary font-italic">Sin descripción</h4>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>   

            <div class="row mb-3">
                <div class="col text-center">
                    <a  class="btn btnColor" href="/documentos/{{  $documento->id }}/edit">Editar</a>
                </div>
                <div class="col text-center">
                    <a  class="btn btnColor" target="_blank" href="{{  $documento->url }}">descargar</a>
                </div>
                <div class="col text-center">
                    <a  class="btn btnColor" href="/documentos">Volver</a>
                </div>
            </div>

  




        </div>
    
    </div>
@endauth


@endsection