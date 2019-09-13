@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center animated fadeIn mt-5 mb-5">
        <div class="col col-auto bg-white rounded shadow">

            <div class="row justify-content-between mt-3 animated fadeIn">
                <div class="col col-auto">
                    <h2 class="blued mb-0">Editar Empleado</h2>
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

            <form action="/empleados/{{ $empleado->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                        <input name="apellido" type="text" value="{{$empleado->apellido}}" class="form-control" id="apellido" aria-describedby="apellido" placeholder="Apellido...">
                            @error('apellido')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input name="nombre" type="text" value="{{$empleado->nombre}}" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre...">
                            @error('nombre')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input name="email" type="text" value="{{$empleado->email}}" class="form-control" id="email" aria-describedby="departamento" placeholder="E-mail...">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Foto:</label>
                            <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Foto...">
                            <small id="emailHelp" class="form-text text-muted">Si desea sustituir el archivo, complete este campo, de lo contrario déjelo vacio.</small>
                        </div>
                    </div>
                </div>
              
                <div class="row mb-1">
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
            <form action="/empleados/{{ $empleado->id}}" method="POST" enctype="multipart/form-data">
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
