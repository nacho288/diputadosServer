@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center mt-4">
        <div class="col text-center">
            <h1 class="text-secondary display-4">Editar documento</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col col-lg-5">

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="/documentos/{{ $documento->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                        <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" value="{{$documento->nombre}}" placeholder="Nombre...">
                            @error('nombre')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" value="{{$documento->nombre}}" placeholder="Descripción..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Archivo:</label>
                            <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="imagen...">
                            <small id="emailHelp" class="form-text text-muted">Si desea sustituir el archivo, complete este campo, de lo contrario déjelo vacio.</small>
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