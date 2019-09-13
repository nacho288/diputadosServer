@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

<div class="row justify-content-center animated fadeIn mt-5">
    <div class="col col-lg-6 bg-white rounded shadow">

        <div class="row justify-content-between mt-3 animated fadeIn">
            <div class="col col-auto">
                <h2 class="blued mb-0">Editar evento</h2>
            </div>
            <div class="col col-auto">
                <button type="button" class="btn btnColor" data-toggle="modal" data-target="#eliminarModal">
                    Eliminar
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <hr>
            </div>
        </div>

        <div class="row justify-content-center animated fadeIn">
            <div class="col">
                <form action="/eventos/{{ $pack['evento']->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-6">
                        
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input value="{{  $pack['evento']->titulo }}" name="titulo" type="text" class="form-control" id="titulo" aria-describedby="titulo" placeholder="Título...">
                            @error('titulo')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="extracto">Extracto:</label>
                            <textarea name="extracto" class="form-control" id="extracto" placeholder="Extracto...">{{$pack['evento']->extracto }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="contenido">Contenido:</label>
                            <textarea name="cuerpo" class="form-control" rows="10" id="contenido" placeholder="Contenido...">{{$pack['evento']->cuerpo }}</textarea>
                            @error('cuerpo')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="desde">Válido desde:</label>
                            <input value="{{  $pack['evento']->desde }}" name="desde" type="date" class="form-control" id="desde" aria-describedby="desde">
                            @error('desde')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="hasta">Válido hasta:</label>
                            <input value="{{  $pack['evento']->hasta }}" name="hasta" type="date" class="form-control" id="hasta" aria-describedby="hasta">
                            @error('hasta')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="imagen">Imagen:</label>
                            <input name="file" type="file" class="form-control-file" id="imagen" aria-describedby="imagen" placeholder="imagen...">
                            <small class="" id="emailHelp" class="form-text text-muted">Si desea sustituir la imagen, complete este campo, de lo contrario déjelo vacio.</small>
                        </div>
                        <div class="form-check mt-1 mb-3">
                            <input name="sin" type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Sin imagen</label>
                        </div>

                        <div class="form-group">
                            <label for="video">Url del video:</label>
                            <input value="{{  $pack['evento']->url_video }}" name="url_video" type="url" class="form-control" id="video" aria-describedby="video" placeholder="url...">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select name="categoria" class="form-control" id="categoria">
                                @foreach ($pack['categorias'] as $categoria)
                                    <option 
                                    @if ($categoria->id == $pack['evento']->categorias[0]->id)
                                    selected
                                    @endif
                                    value="{{$categoria->id}}">{{$categoria->nombre}}</option>  
                                @endforeach
                            </select>
                            @error('categoria')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input  
                            @if ($pack['evento']->destacado)
                                checked
                            @endif
                            name="destacado" type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Destacado</label>
                        </div>
                    </div>

                </div>

                    <div class="row">
                        <div class="col text-center">
                            <hr>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col text-center">
                            <button type="submit" class="btn btnColor">Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="eliminarModalLabel">Aviso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Esta seguro de que desea eliminar este registro?
        </div>
        <div class="modal-footer">
            <form action="/eventos/{{ $pack['evento']->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <button type="button" class="btn btnColor" data-dismiss="modal">Volver</button>
        </div>
        </div>
    </div>
</div>


@endauth


@endsection