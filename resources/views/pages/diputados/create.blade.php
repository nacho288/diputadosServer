@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')
    <div class="row justify-content-center animated fadeIn mt-5 mb-5">
        <div class="col col-auto bg-white rounded shadow">

            <div class="row justify-content-center mt-3 animated fadeIn">
                <div class="col">
                    <h2 class="blued mb-0">Añadir Diputado</h2>
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
                            <a class="nav-link blued" id="secretaria-tab" data-toggle="tab" href="#secretaria" role="tab" aria-controls="secretaria" aria-selected="false">Secretario/a</a>
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

            <form action="/diputados" method="POST" enctype="multipart/form-data">
            @csrf

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
                                    <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre...">
                                    @error('nombre')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input name="apellido" type="text" class="form-control" id="apellido" aria-describedby="apellido" placeholder="Apellido...">
                                    @error('apellido')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dni">DNI:</label>
                                    <input name="dni" type="text" class="form-control" id="dni" aria-describedby="dni" placeholder="DNI...">
                                    @error('dni')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="naciminento">Fecha de naciminento:</label>
                                    <input name="fecha_nacimiento" type="date" class="form-control" id="naciminento" aria-describedby="naciminento" placeholder="Fecha de naciminento...">
                                    @error('fecha_nacimiento')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado civil:</label>
                                    <input name="estado_civil" type="text" class="form-control" id="estado" aria-describedby="estado" placeholder="Estado civil...">
                                    @error('estado_civil')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-md-12 col-lg">
                                <div class="form-group">
                                    <label for="domicilio">Domicilio:</label>
                                    <input name="domicilio" type="text" class="form-control" id="domicilio" aria-describedby="domicilio" placeholder="Domicilio...">
                                    @error('domicilio')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="enSantaFe">Domicilio en Santa Fe:</label>
                                    <input name="domicilio_en_santa_fe" type="text" class="form-control" id="enSantaFe" aria-describedby="enSantaFe" placeholder="Domicilio en Santa Fe:...">
                                    @error('domicilio_en_santa_fe')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="localidad">Localidad:</label>
                                    <input name="localidad" type="text" class="form-control" id="localidad" aria-describedby="localidad" placeholder="Localidad...">
                                    @error('localidad')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="departamento">Departamento:</label>
                                    <input name="departamento" type="text" class="form-control" id="departamento" aria-describedby="departamento" placeholder="Departamento...">
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
                                    <input name="telefono_particular" type="text" class="form-control" id="particular" aria-describedby="particular" placeholder="Telefono particular...">
                                </div>
                                <div class="form-group">
                                    <label for="celular">Teléfono celular:</label>
                                    <input name="telefono_celular" type="text" class="form-control" id="celular" aria-describedby="celular" placeholder="Telefono celular...">
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Foto:</label>
                                    <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Foto...">
                                    <small id="emailHelp" class="form-text text-muted">Si desea sustituir la imagen, complete este campo, de lo contrario déjelo vacio.</small>
                                </div>
                            </div>
                            <div class="col col-lg-12 col-xl">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="E-mail...">
                                </div>
                                <div class="form-group">
                                    <label for="profesion">Profesión:</label>
                                    <input name="profesion" type="text" class="form-control" id="profesion" aria-describedby="profesion" placeholder="Profesión...">
                                </div>
                                <div class="form-group">
                                    <label for="conyugue">Cónyugue:</label>
                                    <input name="conyugue" type="text" class="form-control" id="conyugue" aria-describedby="conyugue" placeholder="Cónyugue...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="secretaria" role="tabpanel" aria-labelledby="secretaria-tab">

                        <div class="row">
                            <div class="col mt-3 mb-3">
                                <h4 class="blued mb-0">Datos de secretario/a:</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-lg-12 col-xl">
                                 <div class="form-group">
                                    <label for="secretaria">Secretario/a:</label>
                                    <input name="secretaria" type="text" class="form-control" id="secretaria" aria-describedby="secretaria" placeholder="Secretario/a...">
                                </div>
                                <div class="form-group">
                                    <label for="telSecretaria">Teléfono particular de secretario/a:</label>
                                    <input name="telefono_particular_secretaria" type="text" class="form-control" id="telSecretaria" aria-describedby="telSecretaria" placeholder="Teléfono particular de secretario/a...">
                                </div>
                            </div>
                            <div class="col col-lg-12 col-xl">
                                <div class="form-group">
                                    <label for="celSecretaria">Teléfono celular de secretario/a:</label>
                                    <input name="telefono_celular_secretaria" type="text" class="form-control" id="celSecretaria" aria-describedby="celSecretaria" placeholder="Teléfono celular de secretario/a...">
                                </div>
                                <div class="form-group">
                                    <label for="emailSecretaria">E-mail de secretario/a:</label>
                                    <input name="email_secretaria" type="text" class="form-control" id="emailSecretaria" aria-describedby="emailSecretaria" placeholder="E-mail de secretaria...">
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
                                @foreach ($bloque->subbloques as $subbloque)
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="subbloque_id" id="subbloque_id_{{$subbloque->id}}" value="{{$subbloque->id}}">
                                    <label class="form-check-label" for="subbloque_id_{{$subbloque->id}}">
                                        {{$subbloque->nombre}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endforeach


                        </div>

                    </div>

                    <div class="tab-pane fade" id="internas" role="tabpanel" aria-labelledby="internas-tab">

                                <div class="row">
                                    <div class="col mt-3 mb-3">
                                        <h4 class="blued mb-0">Comiciones internas:</h4>
                                    </div>
                                </div>

                                @foreach ($pack['internas'] as $interna)
                                <div class="row justify-content-center ml-3">

                                    <div class="col">
                                        <div class="form-check">
                                            <h5>
                                                <input class="form-check-input" name='internas[]' type="checkbox" value="{{$interna->id}}" id="defaultChecki{{$interna->id}}">
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
                                <h4 class="blued mb-0">Comiciones especiales:</h4>
                            </div>
                        </div>

                        @foreach ($pack['especiales'] as $especial)
                        <div class="row justify-content-center ml-3">

                            <div class="col">
                                <div class="form-check">
                                    <h5>
                                        <input class="form-check-input" name='especiales[]' type="checkbox" value="{{$especial->id}}" id="defaultChecki{{$especial->id}}">
                                        <label class="form-check-label" for="defaultChecki{{$especial->id}}">
                                        {{$especial->nombre}}
                                        </label>
                                    </h5>
                                </div>
                            </div>

                        </div>
                         @endforeach

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
