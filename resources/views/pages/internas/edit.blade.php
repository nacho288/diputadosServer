@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center animated fadeIn mt-5">
        <div class="col col-md-6 col-lg-4 bg-white rounded shadow-sm">

            <div class="row justify-content-between mt-3 animated fadeIn">
                <div class="col col-auto">
                    <h2 class="blued mb-0">Editar comisión interna</h2>
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
                                    <label for="secretario_id">Secretaria/o:</label>
                                    <select name="secretario_id" class="form-control" id="secretario_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($empleados as $empleado)
                                            <option value="{{$empleado->id}}"
                                            @if ($interna->secretario_id == $empleado->id)
                                            selected    
                                            @endif
                                            >{{$empleado->apellido}} {{$empleado->nombre}}</option>  
                                        @endforeach
                                    </select>
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
                                    <label for="vice_id">Vicepresidente:</label>
                                    <select name="vice_id" class="form-control" id="vice_id">
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
            <form action="/internas/{{ $interna->id}}" method="POST" enctype="multipart/form-data">
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