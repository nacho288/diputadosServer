@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center mt-4 animated fadeIn">
        <div class="col text-center">
            <h1 class="text-secondary display-4">Añadir Diputado</h1>
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
                    <form action="/diputados/{{ $diputado->id}}" method="POST">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" value="{{ $diputado->nombre}}" placeholder="Nombre...">
                            @error('nombre')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input name="apellido" type="text" class="form-control" id="apellido" aria-describedby="apellido" value="{{ $diputado->apellido}}" placeholder="Apellido...">
                            @error('apellido')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI:</label>
                            <input name="dni" type="text" class="form-control" id="dni" aria-describedby="dni" value="{{ $diputado->dni}}" placeholder="DNI...">
                            @error('dni')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="naciminento">Fecha de naciminento:</label>
                            <input name="fecha_naciminento" type="date" class="form-control" id="naciminento" value="{{ $diputado->fecha_naciminento}}" aria-describedby="naciminento" placeholder="Fecha de naciminento...">
                            @error('fecha_naciminento')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado civil:</label>
                            <input name="estado_civil" type="text" class="form-control" id="estado" value="{{ $diputado->estado_civil}}" aria-describedby="estado" placeholder="Estado civil...">
                            @error('estado_civil')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="domicilio">Domicilio:</label>
                            <input name="domicilio" type="text" class="form-control" id="domicilio" value="{{ $diputado->domicilio}}" aria-describedby="domicilio" placeholder="Domicilio...">
                            @error('domicilio')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="enSantaFe">Domicilio en Santa Fe:</label>
                            <input name="domicilio_en_santa_fe" type="text" class="form-control" value="{{ $diputado->domicilio_en_santa_fe}}" id="enSantaFe" aria-describedby="enSantaFe" placeholder="Domicilio en Santa Fe:...">
                            @error('domicilio_en_santa_fe')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="localidad">Localidad:</label>
                            <input name="localidad" type="text" class="form-control" id="localidad" value="{{ $diputado->localidad}}" aria-describedby="localidad" placeholder="Localidad...">
                            @error('localidad')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento:</label>
                            <input name="departamento" type="text" class="form-control" id="departamento" value="{{ $diputado->departamento}}" aria-describedby="departamento" placeholder="Departamento...">
                            @error('departamento')
                                <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="particular">Teléfono particular:</label>
                            <input name="telefono_particular" type="text" class="form-control" id="particular" value="{{ $diputado->telefono_particular}}" aria-describedby="particular" placeholder="Telefono particular...">
                        </div>
                        <div class="form-group">
                            <label for="celular">Teléfono celular:</label>
                            <input name="telefono_celular" type="text" class="form-control" id="celular" value="{{ $diputado->telefono_celular}}" aria-describedby="celular" placeholder="Telefono celular...">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input name="email" type="email" class="form-control" id="email" value="{{ $diputado->email}}" aria-describedby="email" placeholder="E-mail...">
                        </div>
                        <div class="form-group">
                            <label for="profesion">Profesión:</label>
                            <input name="profesion" type="text" class="form-control" id="profesion" value="{{ $diputado->profesion}}" aria-describedby="profesion" placeholder="Profesión...">
                        </div>
                        <div class="form-group">
                            <label for="conyugue">Cónyugue:</label>
                            <input name="conyugue" type="text" class="form-control" id="conyugue" value="{{ $diputado->conyugue}}" aria-describedby="conyugue" placeholder="Cónyugue...">
                        </div>
                        <div class="form-group">
                            <label for="secretaria">Secretaria:</label>
                            <input name="secretaria" type="text" class="form-control" id="secretaria" value="{{ $diputado->secretaria}}" aria-describedby="secretaria" placeholder="Secretaria...">
                        </div>
                        <div class="form-group">
                            <label for="telSecretaria">Teléfono particular de secretaria:</label>
                            <input name="telefono_particular_secretaria" type="text" class="form-control" value="{{ $diputado->telefono_particular_secretaria}}" id="telSecretaria" aria-describedby="telSecretaria" placeholder="Teléfono particular de secretaria...">
                        </div>
                        <div class="form-group">
                            <label for="celSecretaria">Teléfono celular de secretaria:</label>
                            <input name="telefono_celular_secretaria" type="text" class="form-control" value="{{ $diputado->telefono_celular_secretaria}}" id="celSecretaria" aria-describedby="celSecretaria" placeholder="Teléfono celular de secretaria...">
                        </div>
                        <div class="form-group">
                            <label for="emailSecretaria">E-mail de secretaria:</label>
                            <input name="email_secretaria" type="text" class="form-control" value="{{ $diputado->email_secretaria}}" id="emailSecretaria" aria-describedby="emailSecretaria" placeholder="E-mail de secretaria...">
                        </div>
                        

                        <div class="row">
                            <div class="col text-center">
                                <hr>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-dark">Guardar</button>
                            </div>
                            <div class="col text-center">
                                <a class="btn btn-dark" href="/diputados">Volver</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
                </div>
            </div>


        

    </div>
@endauth


@endsection