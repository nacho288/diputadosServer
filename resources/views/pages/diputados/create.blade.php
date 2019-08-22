@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth



    <div class="row justify-content-center animated fadeIn mt-5 mb-5">
        <div class="col col-lg-6 bg-white rounded shadow">

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
                    <form action="/diputados" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-12 col-md-6">
                                
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
                                    <input name="fecha_naciminento" type="date" class="form-control" id="naciminento" aria-describedby="naciminento" placeholder="Fecha de naciminento...">
                                    @error('fecha_naciminento')
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

                            <div class="col-12 col-md-6">
                                
                                <div class="form-group">
                                    <label for="particular">Teléfono particular:</label>
                                    <input name="telefono_particular" type="text" class="form-control" id="particular" aria-describedby="particular" placeholder="Telefono particular...">
                                </div>
                                <div class="form-group">
                                    <label for="celular">Teléfono celular:</label>
                                    <input name="telefono_celular" type="text" class="form-control" id="celular" aria-describedby="celular" placeholder="Telefono celular...">
                                </div>
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
                                <div class="form-group">
                                    <label for="secretaria">Secretaria:</label>
                                    <input name="secretaria" type="text" class="form-control" id="secretaria" aria-describedby="secretaria" placeholder="Secretaria...">
                                </div>
                                <div class="form-group">
                                    <label for="telSecretaria">Teléfono particular de secretaria:</label>
                                    <input name="telefono_particular_secretaria" type="text" class="form-control" id="telSecretaria" aria-describedby="telSecretaria" placeholder="Teléfono particular de secretaria...">
                                </div>
                                <div class="form-group">
                                    <label for="celSecretaria">Teléfono celular de secretaria:</label>
                                    <input name="telefono_celular_secretaria" type="text" class="form-control" id="celSecretaria" aria-describedby="celSecretaria" placeholder="Teléfono celular de secretaria...">
                                </div>
                                <div class="form-group">
                                    <label for="emailSecretaria">E-mail de secretaria:</label>
                                    <input name="email_secretaria" type="text" class="form-control" id="emailSecretaria" aria-describedby="emailSecretaria" placeholder="E-mail de secretaria...">
                                </div>

                            </div>
                            
                        </div>

                        <div class="row justify-content-center">
                            <div class="col te">
                                <div class="form-group">
                                    <label for="imagen">Foto:</label>
                                    <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Foto...">
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