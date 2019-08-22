@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

<div class="row justify-content-center animated fadeIn mt-5">
    <div class="col col-lg-6 bg-white rounded shadow">

        <div class="row justify-content-center mt-3 animated fadeIn">
            <div class="col">
                <h2 class="blued mb-0">Nuevo evento</h2>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="/eventos" method="POST" enctype="multipart/form-data">
                @csrf   
                    <div class="row ">
                        
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input name="titulo" type="text" class="form-control" id="titulo" aria-describedby="titulo" placeholder="Título...">
                                @error('titulo')
                                    <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="extracto">Extracto:</label>
                                <textarea name="extracto" class="form-control" id="extracto" placeholder="Extracto..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="contenido">Contenido:</label>
                                <textarea name="cuerpo" class="form-control" id="contenido" placeholder="Contenido..." rows="7"></textarea>
                                @error('cuerpo')
                                    <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="desde">Válido desde:</label>
                                <input name="desde" type="date" class="form-control" id="desde" aria-describedby="desde">
                                @error('desde')
                                    <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hasta">Válido hasta:</label>
                                <input name="hasta" type="date" class="form-control" id="hasta" aria-describedby="hasta">
                                @error('hasta')
                                    <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input name="file" type="file" class="form-control-file" id="imagen" aria-describedby="imagen" placeholder="imagen...">
                            </div>
                            <div class="form-group">
                                <label for="video">Url del video:</label>
                                <input name="url_video" type="url" class="form-control" id="video" aria-describedby="video" placeholder="url...">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" class="form-control" id="categoria">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>  
                                    @endforeach
                                </select>
                                @error('categoria')
                                    <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input name="destacado" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Destacado</label>
                            </div>
                        </div>
                        
                    </div>

                    @csrf
                        
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
@endauth


@endsection