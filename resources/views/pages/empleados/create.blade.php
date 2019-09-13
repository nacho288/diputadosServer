@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')
    <div class="row justify-content-center animated fadeIn mt-5 mb-5">
        <div class="col col-auto bg-white rounded shadow">

            <div class="row justify-content-center mt-3 animated fadeIn">
                <div class="col">
                    <h2 class="blued mb-0">Añadir nuevo empleado</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <form action="/empleados" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input name="apellido" type="text" class="form-control" id="apellido" aria-describedby="apellido" placeholder="Apellido...">
                            @error('apellido')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre...">
                            @error('nombre')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input name="email" type="text" class="form-control" id="email" aria-describedby="departamento" placeholder="E-mail...">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Foto:</label>
                            <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Foto...">
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
@endsection
