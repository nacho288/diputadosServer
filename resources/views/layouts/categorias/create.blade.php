@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center mt-4 animated fadeIn">
        <div class="col text-center">
            <h1 class="text-secondary display-4">Nueva categoria</h1>
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