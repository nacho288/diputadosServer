@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center mt-4 animated fadeIn">
        <div class="col text-center">
            <h1 class="text-secondary display-4">Nueva noticia</h1>
        </div>
    </div>

    <div class="row justify-content-center animated fadeIn">
        <div class="col col-lg-4">

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="/noticias/{{ $pack['noticia']->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input value="{{  $pack['noticia']->titulo }}" name="titulo" type="text" class="form-control" id="titulo" aria-describedby="titulo" placeholder="Título...">
                            @error('titulo')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="extracto">Extracto:</label>
                            <textarea name="extracto" class="form-control" id="extracto" placeholder="Extracto...">{{$pack['noticia']->extracto }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="contenido">Contenido:</label>
                            <textarea name="cuerpo" class="form-control" id="contenido" placeholder="Contenido...">{{$pack['noticia']->cuerpo }}</textarea>
                            @error('cuerpo')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desde">Válido desde:</label>
                            <input value="{{  $pack['noticia']->desde }}" name="desde" type="date" class="form-control" id="desde" aria-describedby="desde">
                            @error('desde')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="hasta">Válido hasta:</label>
                            <input value="{{  $pack['noticia']->hasta }}" name="hasta" type="date" class="form-control" id="hasta" aria-describedby="hasta">
                            @error('hasta')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input name="file" type="file" class="form-control-file" id="imagen" aria-describedby="imagen" placeholder="imagen...">
                            <small id="emailHelp" class="form-text text-muted">Si desea sustituir la imagen, complete este campo, de lo contrario déjelo vacio.</small>
                        </div>
                        <div class="form-group">
                            <label for="video">Url del video:</label>
                            <input value="{{  $pack['noticia']->url_video }}" name="url_video" type="url" class="form-control" id="video" aria-describedby="video" placeholder="url...">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select name="categoria" class="form-control" id="categoria">
                                @foreach ($pack['categorias'] as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>  
                                @endforeach
                            </select>
                            @error('categoria')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input value="{{  $pack['noticia']->destacado }}" name="destacado" type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Destacada</label>
                        </div>
                         
                        <div class="row">
                            <div class="col text-center">
                                <hr>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-dark">Guardar</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                </div>
            </div>


        

    </div>
@endauth


@endsection