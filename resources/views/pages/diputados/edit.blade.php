@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center animated fadeIn mt-5 mb-5">
        <div class="col col-auto bg-white rounded shadow">

            <div class="row justify-content-between mt-3 animated fadeIn">
                <div class="col col-auto">
                    <h2 class="blued mb-0">Editar Diputado</h2>
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active blued" id="obligatorios-tab" data-toggle="tab" href="#obligatorios" role="tab" aria-controls="obligatorios" aria-selected="true">Obligatorios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blued" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="personales" aria-selected="false">Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blued" id="secretaria-tab" data-toggle="tab" href="#secretaria" role="tab" aria-controls="secretaria" aria-selected="false">Secretaria/o</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blued" id="bloques-tab" data-toggle="tab" href="#bloques" role="tab" aria-controls="bloques" aria-selected="false">Bloques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blued" id="internas-tab" data-toggle="tab" href="#internas" role="tab" aria-controls="internas" aria-selected="false">Comisiones internas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blued" id="especiales-tab" data-toggle="tab" href="#especiales" role="tab" aria-controls="especiales" aria-selected="false">Comisiones especiales</a>
                        </li>
                    </ul>
                </div>
            </div>

            <form action="/diputados/{{ $pack['diputado']->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="obligatorios" role="tabpanel" aria-labelledby="obligatorios-tab">

                        <div class="row">
                            <div class="col mt-3 mb-3">
                                <h4 class="blued mb-0">Campos obligatorios:</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-lg-12 col-xl">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input name="nombre" type="text" value="{{ $pack['diputado']->nombre}}" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre...">
                                    @error('nombre')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input name="apellido" type="text" value="{{ $pack['diputado']->apellido}}" class="form-control" id="apellido" aria-describedby="apellido" placeholder="Apellido...">
                                    @error('apellido')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dni">DNI:</label>
                                    <input name="dni" type="text" value="{{ $pack['diputado']->dni}}" class="form-control" id="dni" aria-describedby="dni" placeholder="DNI...">
                                    @error('dni')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="naciminento">Fecha de naciminento:</label>
                                    <input name="fecha_nacimiento" type="date" value="{{ $pack['diputado']->fecha_nacimiento}}" class="form-control" id="naciminento" aria-describedby="naciminento" placeholder="Fecha de naciminento...">
                                    @error('fecha_nacimiento')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado civil:</label>
                                    <input name="estado_civil" type="text" value="{{ $pack['diputado']->estado_civil}}" class="form-control" id="estado" aria-describedby="estado" placeholder="Estado civil...">
                                    @error('estado_civil')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-md-12 col-lg">
                                <div class="form-group">
                                    <label for="domicilio">Domicilio:</label>
                                    <input name="domicilio" type="text" value="{{ $pack['diputado']->domicilio}}" class="form-control" id="domicilio" aria-describedby="domicilio" placeholder="Domicilio...">
                                    @error('domicilio')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="enSantaFe">Domicilio en Santa Fe:</label>
                                    <input name="domicilio_en_santa_fe" type="text" value="{{ $pack['diputado']->domicilio_en_santa_fe}}" class="form-control" id="enSantaFe" aria-describedby="enSantaFe" placeholder="Domicilio en Santa Fe:...">
                                    @error('domicilio_en_santa_fe')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="localidad">Localidad:</label>
                                    <input name="localidad" type="text" value="{{ $pack['diputado']->localidad}}" class="form-control" id="localidad" aria-describedby="localidad" placeholder="Localidad...">
                                    @error('localidad')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="departamento">Departamento:</label>
                                    <input name="departamento" type="text" value="{{ $pack['diputado']->departamento}}" class="form-control" id="departamento" aria-describedby="departamento" placeholder="Departamento...">
                                    @error('departamento')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="personales" role="tabpanel" aria-labelledby="personales-tab">

                        <div class="row">
                            <div class="col mt-3 mb-3">
                                <h4 class="blued mb-0">Datos personales:</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-lg-12 col-xl">
                                <div class="form-group">
                                    <label for="particular">Teléfono particular:</label>
                                    <input name="telefono_particular" type="text" value="{{ $pack['diputado']->telefono_particular}}" class="form-control" id="particular" aria-describedby="particular" placeholder="Telefono particular...">
                                </div>
                                <div class="form-group">
                                    <label for="celular">Teléfono celular:</label>
                                    <input name="telefono_celular" type="text" value="{{ $pack['diputado']->telefono_celular}}" class="form-control" id="celular" aria-describedby="celular" placeholder="Telefono celular...">
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Foto:</label>
                                    <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Foto...">
                                    <small id="emailHelp" class="form-text text-muted">Si desea sustituir la imagen, complete este campo, de lo contrario déjelo vacio.</small>
                                </div>
                                <div class="form-check mt-0 mb-2">
                                    <input name="sin" type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2">Sin imagen</label>
                                </div>
                            </div>
                            <div class="col col-lg-12 col-xl">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input name="email" type="email" value="{{ $pack['diputado']->email}}" class="form-control" id="email" aria-describedby="email" placeholder="E-mail...">
                                </div>
                                <div class="form-group">
                                    <label for="profesion">Profesión:</label>
                                    <input name="profesion" type="text" value="{{ $pack['diputado']->profesion}}" class="form-control" id="profesion" aria-describedby="profesion" placeholder="Profesión...">
                                </div>
                                <div class="form-group">
                                    <label for="conyugue">Cónyugue:</label>
                                    <input name="conyugue" type="text" value="{{ $pack['diputado']->conyugue}}" class="form-control" id="conyugue" aria-describedby="conyugue" placeholder="Cónyugue...">
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane fade" id="secretaria" role="tabpanel" aria-labelledby="secretaria-tab">

                        <div class="row">
                            <div class="col mt-3 mb-3">
                                <h4 class="blued mb-0">Datos de secretaria/o:</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-lg-12 col-xl">
                                 <div class="form-group">
                                    <label for="secretaria">Secretaria/o:</label>
                                    <input name="secretaria" type="text" value="{{ $pack['diputado']->secretaria}}" class="form-control" id="secretaria" aria-describedby="secretaria" placeholder="Secretaria/o...">
                                </div>
                                <div class="form-group">
                                    <label for="telSecretaria">Teléfono particular de secretaria/o:</label>
                                    <input name="telefono_particular_secretaria" type="text" value="{{ $pack['diputado']->telefono_particular_secretaria}}" class="form-control" id="telSecretaria" aria-describedby="telSecretaria" placeholder="Teléfono particular de secretaria/o...">
                                </div>
                            </div>
                            <div class="col col-lg-12 col-xl">
                                <div class="form-group">
                                    <label for="celSecretaria">Teléfono celular de secretaria/o:</label>
                                    <input name="telefono_celular_secretaria" type="text" value="{{ $pack['diputado']->telefono_celular_secretaria}}" class="form-control" id="celSecretaria" aria-describedby="celSecretaria" placeholder="Teléfono celular de secretaria/o...">
                                </div>
                                <div class="form-group">
                                    <label for="emailSecretaria">E-mail de secretaria/o:</label>
                                    <input name="email_secretaria" type="text" value="{{ $pack['diputado']->email_secretaria}}" class="form-control" id="emailSecretaria" aria-describedby="emailSecretaria" placeholder="E-mail de secretaria/o...">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="bloques" role="tabpanel" aria-labelledby="bloques-tab">

                        <div class="row">
                            <div class="col mt-3 mb-3">
                                <h4 class="blued mb-0">Bloque y Sub-bloque:</h4>
                            </div>
                        </div>

                        <div class="row justify-content-center">

                            @foreach ($pack['bloques'] as $bloque)
                            <div class="col col-md-12 col-xl-5 m-3 p-3 border shadow-sm">
                                <h5>{{$bloque->nombre}}</h5>
                                <hr>
                                @foreach ($bloque->subbloques as $subbloque)
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="subbloque_id" id="subbloque_id_{{$subbloque->id}}" value="{{$subbloque->id}}"
                                    @if ($subbloque->id == $pack['diputado']->subbloque_id)
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="subbloque_id_{{$subbloque->id}}">
                                        {{$subbloque->nombre}}
                                    </label>
                                </div>
                                @endforeach
                                @if (count($bloque->subbloques) == 0)
                                    (sin sub-bloques)
                                @endif
                            </div>
                            @endforeach


                        </div>

                    </div>

                    <div class="tab-pane fade" id="internas" role="tabpanel" aria-labelledby="internas-tab">

                        <div class="row">
                            <div class="col mt-3 mb-3">
                                <h4 class="blued mb-0">Comisiones internas:</h4>
                            </div>
                        </div>

                        @foreach ($pack['internas'] as $interna)
                        <div class="row justify-content-center ml-3">

                            <div class="col">
                                <div class="form-check">
                                    <h5>
                                        <input class="form-check-input" name='internas[]' type="checkbox" value="{{$interna->id}}" id="defaultChecki{{$interna->id}}"
                                        @if ($pack['diputado']->internaTiene($interna->id))
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="defaultChecki{{$interna->id}}">
                                        {{$interna->nombre}}
                                        </label>
                                    </h5>
                                </div>
                            </div>

                        </div>
                         @endforeach

                    </div>

                    <div class="tab-pane fade" id="especiales" role="tabpanel" aria-labelledby="especiales-tab">

                        <div class="row">
                            <div class="col mt-3 mb-3">
                                <h4 class="blued mb-0">Comisiones especiales:</h4>
                            </div>
                        </div>

                        @foreach ($pack['especiales'] as $especial)
                        <div class="row justify-content-center ml-3">

                            <div class="col">
                                <div class="form-check">
                                    <h5>
                                        <input class="form-check-input" name='especiales[]' type="checkbox" value="{{$especial->id}}" id="defaultChecki{{$especial->id}}"
                                        @if ($pack['diputado']->especialTiene($especial->id))
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="defaultChecki{{$especial->id}}">
                                        {{ $especial->nombre }}
                                        </label>
                                    </h5>
                                </div>
                            </div>

                        </div>
                         @endforeach

                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col text-center">
                        <hr>
                    </div>
                </div>
                <div class="row mb-3 justify-content-between">
                    
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
                <form action="/diputados/{{ $pack['diputado']->id}}" method="POST" enctype="multipart/form-data">
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
