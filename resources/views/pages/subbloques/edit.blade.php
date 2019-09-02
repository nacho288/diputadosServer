@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center animated fadeIn mt-5">
        <div class="col col-md-6 col-lg-4 bg-white rounded shadow-sm">

            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Editar Sub-Bloque</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="/subbloques/{{ $subbloque->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                        <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" value="{{$subbloque->nombre}}" placeholder="Nombre...">
                            @error('nombre')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="imagen">Logo:</label>
                            <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="logo" placeholder="logo...">
                            <small id="emailHelp" class="form-text text-muted">Si desea sustituir el logo, complete este campo, de lo contrario déjelo vacio.</small>
                        </div>
                        <div class="form-group">
                            <label for="presidente_id">Presidente:</label>
                            <select name="presidente_id" class="form-control" id="presidente_id">
                                <option value="{{null}}">sin definir</option>
                                @foreach ($subbloque->diputados as $diputado)
                                    <option value="{{$diputado->id}}"
                                    @if ($subbloque->presidente_id == $diputado->id)
                                    selected    
                                    @endif
                                    >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                @endforeach
                            </select>
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
@endauth


@endsection