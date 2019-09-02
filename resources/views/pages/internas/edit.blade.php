@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center animated fadeIn mt-5">
        <div class="col col-md-6 col-lg-4 bg-white rounded shadow-sm">

            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Editar comición interna</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="/internas/{{ $interna->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input name="nombre" value="{{$interna->nombre}}" type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre...">
                                    @error('nombre')
                                        <small id="emailHelp" class="form-text text-danger">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="secretario">Secretario:</label>
                                    <input name="secretario" value="{{$interna->secretario}}" type="text" class="form-control" id="secretario" aria-describedby="secretario" placeholder="Secretario/a...">
                                </div>
                                <div class="form-group">
                                    <label for="presidente_id">Presidente:</label>
                                    <select name="presidente_id" class="form-control" id="presidente_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($interna->diputados as $diputado)
                                            <option value="{{$diputado->id}}"
                                            @if ($interna->presidente_id == $diputado->id)
                                            selected    
                                            @endif
                                            >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="presidente_id">Vicepresidente:</label>
                                    <select name="presidente_id" class="form-control" id="presidente_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($interna->diputados as $diputado)
                                            <option value="{{$diputado->id}}"
                                            @if ($interna->vice_id == $diputado->id)
                                            selected    
                                            @endif
                                            >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección:</label>
                                    <input name="direccion" value="{{$interna->direccion}}" type="text" class="form-control" id="direccion" aria-describedby="direccion" placeholder="Dirección...">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input name="telefono" value="{{$interna->telefono}}" type="text" class="form-control" id="telefono" aria-describedby="telefono" placeholder="Teléfono...">
                                </div>
                                
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input name="email" value="{{$interna->email}}" type="text" class="form-control" id="email" aria-describedby="email" placeholder="E-mail...">
                                </div>
                                <div class="form-group">
                                    <label for="reunion">Reuniones:</label>
                                    <input name="reunion" value="{{$interna->reunion}}" type="text" class="form-control" id="reunion" aria-describedby="reunion" placeholder="Reuniones...">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripción..." rows="11">{{$interna->descripcion}}</textarea>
                                </div>
                            </div>

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