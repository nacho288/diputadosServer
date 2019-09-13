@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center  mt-5 animated fadeIn">
        <div class="col col-auto bg-white rounded shadow-sm">
            
            <div class="row justify-content-between mt-3 animated fadeIn">
                <div class="col col-auto">
                    <h2 class="blued mb-0">Editar categoria</h2>
                </div>
                <div class="col col-auto">
                    <button type="button" class="btn btnColor btn-sm mt-2" data-toggle="modal" data-target="#eliminarModal">
                        Eliminar
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                <form action="/categorias/{{ $categoria->id }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="titulo" aria-describedby="nombre" value="{{ $categoria->nombre }}" placeholder="Nombre...">
                            @error('nombre')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                            
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
            <form action="/categorias/{{ $categoria->id}}" method="POST" enctype="multipart/form-data">
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