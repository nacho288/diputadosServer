@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center  mt-5 animated fadeIn">
        <div class="col col-auto bg-white rounded shadow-sm">
            
             <div class="row mb-0 align-items-center">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Editar categoria</h2>
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
@endauth


@endsection