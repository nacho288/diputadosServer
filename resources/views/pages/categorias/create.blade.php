@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

    <div class="row justify-content-center  mt-5 animated fadeIn">
        <div class="col col-md-6 col-lg-4 bg-white rounded shadow-sm">

             <div class="row mb-0 align-items-center">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Nueva categoria</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="/categorias" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="titulo" aria-describedby="nombre" placeholder="Nombre...">
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

@endsection
