@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">
        <div class="col col-lg-4">
            
            <div class="row">
                <div class="col">
                    <h4 class="display-4"><strong>Datos de Diputado:</span></h4>
                     <h3 class="text-secondary m-0">{{ $diputado->nombre}} {{  $diputado->apellido }}</h3>   
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col">

                    <table class="table table-striped">
                        <tbody>
                            <tr>
                            <td>nombre</td>
                            <td>{{ $diputado->nombre}}</td>
                            </tr>
                            <tr>
                            <td>apellido</td>
                            <td>{{  $diputado->apellido }}</td>
                            </tr>
                            <tr>
                            <td>dni</td>
                            <td>{{  $diputado->dni  }}</td>
                            </tr>
                            <tr>
                            <td>fecha naciminento</td>
                            <td>{{  $diputado->fecha_naciminento }}</td>
                            </tr>
                            <td>estado civil</td>
                            <td>{{  $diputado->estado_civil }}</td>
                            </tr>
                            <tr>
                            <td>domicilio</td>
                            <td>{{  $diputado->domicilio }}</td>
                            </tr>
                            <td>localidad</td>
                            <td>{{  $diputado->localidad }}</td>
                            </tr>
                            <td>departamento</td>
                            <td>{{  $diputado->departamento }}</td>
                            </tr>
                            <td>telefono particular</td>
                            <td>{{  $diputado->telefono_particular }}</td>
                            </tr>
                            <td>telefono celular</td>
                            <td>{{  $diputado->telefono_celular }}</td>
                            </tr>
                            <td>E-mail</td>
                            <td>{{  $diputado->email }}</td>
                            </tr>
                            <td>profesion</td>
                            <td>{{  $diputado->profesion }}</td>
                            </tr>
                            <td>Domicilio en Santa Fe</td>
                            <td>{{  $diputado->domicilio_en_santa_fe }}</td>
                            </tr>
                            <td>Cónyugue</td>
                            <td>{{  $diputado->conyugue }}</td>
                            </tr>
                            <td>Secretaria</td>
                            <td>{{  $diputado->secretaria }}</td>
                            </tr>
                            <td>Teléfono particular secretaria</td>
                            <td>{{  $diputado->telefono_particular_secretaria }}</td>
                            </tr>
                            <td>Teléfono celular secretaria</td>
                            <td>{{  $diputado->telefono_celular_secretaria }}</td>
                            </tr>
                            <td>Email secretaria</td>
                            <td>{{  $diputado->email_secretaria }}</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>


            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col text-center">
                    <a  class="btn btn-dark" href="/diputados/{{  $diputado->id  }}/edit">Editar</a>
                </div>
                <div class="col text-center">
                    <a  class="btn btn-dark" href="/diputados">Volver</a>
                </div>
            </div>

            

  
        </div>
    
    </div>
@endauth


@endsection