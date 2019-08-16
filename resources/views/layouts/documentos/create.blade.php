@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center mt-4 animated fadeIn">
        <div class="col text-center">
            <h1 class="text-secondary display-4">Nuevo documento</h1>
        </div>
    </div>

    <div class="row justify-content-center animated fadeIn">
        <div class="col col-lg-5">

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="/documentos" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre...">
                            @error('nombre')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripción..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Archivo:</label>
                            <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Documento...">
                            @error('file')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
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