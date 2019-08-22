@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth



    <div class="row justify-content-center animated fadeIn mt-5 mb-5">
        <div class="col col-lg-6 bg-white rounded shadow">

            <div class="row justify-content-center mt-3 animated fadeIn">
                <div class="col">
                    <h2 class="blued mb-0">Editar Diputado</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="/diputados/{{ $diputado->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input name="nombre" type="text" value="{{ $diputado->nombre}}" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre...">
                                    @error('nombre')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input name="apellido" type="text" value="{{ $diputado->apellido}}" class="form-control" id="apellido" aria-describedby="apellido" placeholder="Apellido...">
                                    @error('apellido')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dni">DNI:</label>
                                    <input name="dni" type="text" value="{{ $diputado->dni}}" class="form-control" id="dni" aria-describedby="dni" placeholder="DNI...">
                                    @error('dni')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="naciminento">Fecha de naciminento:</label>
                                    <input name="fecha_naciminento" type="date" value="{{ $diputado->fecha_naciminento}}" class="form-control" id="naciminento" aria-describedby="naciminento" placeholder="Fecha de naciminento...">
                                    @error('fecha_naciminento')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado civil:</label>
                                    <input name="estado_civil" type="text" value="{{ $diputado->estado_civil}}" class="form-control" id="estado" aria-describedby="estado" placeholder="Estado civil...">
                                    @error('estado_civil')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="domicilio">Domicilio:</label>
                                    <input name="domicilio" type="text" value="{{ $diputado->domicilio}}" class="form-control" id="domicilio" aria-describedby="domicilio" placeholder="Domicilio...">
                                    @error('domicilio')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="enSantaFe">Domicilio en Santa Fe:</label>
                                    <input name="domicilio_en_santa_fe" type="text" value="{{ $diputado->domicilio_en_santa_fe}}" class="form-control" id="enSantaFe" aria-describedby="enSantaFe" placeholder="Domicilio en Santa Fe:...">
                                    @error('domicilio_en_santa_fe')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="localidad">Localidad:</label>
                                    <input name="localidad" type="text" value="{{ $diputado->localidad}}" class="form-control" id="localidad" aria-describedby="localidad" placeholder="Localidad...">
                                    @error('localidad')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="departamento">Departamento:</label>
                                    <input name="departamento" type="text" value="{{ $diputado->departamento}}" class="form-control" id="departamento" aria-describedby="departamento" placeholder="Departamento...">
                                    @error('departamento')
                                        <small id="emailHelp" class="form-text text-muted">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="particular">Teléfono particular:</label>
                                    <input name="telefono_particular" type="text" value="{{ $diputado->telefono_particular}}" class="form-control" id="particular" aria-describedby="particular" placeholder="Telefono particular...">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="celular">Teléfono celular:</label>
                                    <input name="telefono_celular" type="text" value="{{ $diputado->telefono_celular}}" class="form-control" id="celular" aria-describedby="celular" placeholder="Telefono celular...">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input name="email" type="email" value="{{ $diputado->email}}" class="form-control" id="email" aria-describedby="email" placeholder="E-mail...">
                                </div>
                                <div class="form-group">
                                    <label for="profesion">Profesión:</label>
                                    <input name="profesion" type="text" value="{{ $diputado->profesion}}" class="form-control" id="profesion" aria-describedby="profesion" placeholder="Profesión...">
                                </div>
                                <div class="form-group">
                                    <label for="conyugue">Cónyugue:</label>
                                    <input name="conyugue" type="text" value="{{ $diputado->conyugue}}" class="form-control" id="conyugue" aria-describedby="conyugue" placeholder="Cónyugue...">
                                </div>
                                <div class="form-group">
                                    <label for="secretaria">Secretaria:</label>
                                    <input name="secretaria" type="text" value="{{ $diputado->secretaria}}" class="form-control" id="secretaria" aria-describedby="secretaria" placeholder="Secretaria...">
                                </div>
                                <div class="form-group">
                                    <label for="telSecretaria">Teléfono particular de secretaria:</label>
                                    <input name="telefono_particular_secretaria" type="text" value="{{ $diputado->telefono_particular_secretaria}}" class="form-control" id="telSecretaria" aria-describedby="telSecretaria" placeholder="Teléfono particular de secretaria...">
                                </div>
                                <div class="form-group">
                                    <label for="celSecretaria">Teléfono celular de secretaria:</label>
                                    <input name="telefono_celular_secretaria" type="text" value="{{ $diputado->telefono_celular_secretaria}}" class="form-control" id="celSecretaria" aria-describedby="celSecretaria" placeholder="Teléfono celular de secretaria...">
                                </div>
                                <div class="form-group">
                                    <label for="emailSecretaria">E-mail de secretaria:</label>
                                    <input name="email_secretaria" type="text" value="{{ $diputado->email_secretaria}}" class="form-control" id="emailSecretaria" aria-describedby="emailSecretaria" placeholder="E-mail de secretaria...">
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Foto:</label>
                                    <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Foto...">
                                    <small id="emailHelp" class="form-text text-muted">Si desea sustituir la imagen, complete este campo, de lo contrario déjelo vacio.</small>
                                </div>
                                <div class="form-check mt-1 mb-3">
                                    <input name="sin" type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2">Sin imagen</label>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row justify-content-center">
                            <div class="col te">
                                
                            </div>
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
                        </div>
                        
                    </form>
                </div>
                </div>
            </div>


        

    </div>
@endauth


@endsection