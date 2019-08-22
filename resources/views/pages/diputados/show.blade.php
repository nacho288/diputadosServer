@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth




    <div class="row justify-content-center mt-5 animated fadeIn mb-5">

        <div class="col col-md-6 col-lg-4 bg-white rounded shadow-sm">


            
            <div class="row align-items-center p-0 mt-3">

                <div class="col">
                    <div class="row align-items-center">

                        <div class="col col-auto">
                            @if ($diputado->foto)
                                <img class="rounded-circle shadow-sm" src="{{$diputado->foto}}" height="80" width="80" alt="">
                            @else
                                <img class="rounded-circle shadow-sm" src="{{URL::asset('img/avatar.jpg')}}" height="80" width="80" alt="">
                            @endif
                        </div>
                        
                        <div class="col p-0">
                            <div class="row">
                                <div class="col">
                                    <h2 class="blued m-0">{{  $diputado->apellido }} {{  $diputado->nombre }}</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-secondary font-italic">
                                        Datos de diputado
                                    </h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col col-auto mr-3 text-right">
                    <a  class="btn btnColor" href="/diputados/{{  $diputado->id  }}/edit">Editar</a>
                </div>


            </div>

           
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active blued" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blued" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link blued" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Secretaria</a>
                        </li>
                        </ul>


                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">
                                    <div class="col mt-3 mb-3">
                                        <h4 class="blued mb-0">Datos personales</h4>
                                    </div>
                                </div>

                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <td class="font-weight-bold">nombre:</td>
                                        <td>{{ $diputado->nombre}}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">apellido:</td>
                                        <td>{{  $diputado->apellido }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">dni:</td>
                                        <td>{{  $diputado->dni  }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">fecha naciminento:</td>
                                        <td>{{  $diputado->fecha_naciminento }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">estado civil:</td>
                                        <td>{{  $diputado->estado_civil }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">Cónyugue:</td>
                                        <td>{{  $diputado->conyugue }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">profesion:</td>
                                        <td>{{  $diputado->profesion }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">localidad:</td>
                                        <td>{{  $diputado->localidad }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">departamento:</td>
                                        <td>{{  $diputado->departamento }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">domicilio:</td>
                                        <td>{{  $diputado->domicilio }}</td>
                                        </tr>
                                        <tr>
                                        <td class="font-weight-bold">Domicilio en Santa Fe:</td>
                                        <td>{{  $diputado->domicilio_en_santa_fe }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>


                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <div class="row">
                                    <div class="col mt-3 mb-3">
                                        <h4 class="blued mb-0">Datos de contacto</h4>
                                    </div>
                                </div>
                                
                                <table class="table mb-0">
                                    <tbody>

                                        <tr>
                                        <td>telefono particular:</td>
                                        <td>{{  $diputado->telefono_particular }}</td>
                                        </tr>
                                        <tr>
                                        <td>telefono celular:</td>
                                        <td>{{  $diputado->telefono_celular }}</td>
                                        </tr>
                                        <tr>
                                        <td>E-mail:</td>
                                        <td>{{  $diputado->email }}</td>
                                        </tr>    

                                    </tbody>
                                </table>


                            </div>


                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                
                                <div class="row">
                                    <div class="col mt-3 mb-3">
                                        <h4 class="blued mb-0">Datos de secretaria</h4>
                                    </div>
                                </div>
                                
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <td>Secretaria:</td>
                                        <td>{{  $diputado->secretaria }}</td>
                                        </tr>
                                        <td>Teléfono particular secretaria:</td>
                                        <td>{{  $diputado->telefono_particular_secretaria }}</td>
                                        </tr>
                                        <tr>
                                        <td>Teléfono celular secretaria:</td>
                                        <td>{{  $diputado->telefono_celular_secretaria }}</td>
                                        </tr>
                                        <tr>
                                        <td>Email secretaria:</td>
                                        <td>{{  $diputado->email_secretaria }}</td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                </div>
            </div>

            <div class="row mt-0 p-0">
                <div class="col mt-0 p-0">
                    <hr class="mt-0 mx-3">
                </div>
            </div>


    

            <div class="row mb-3">
                <div class="col text-center">
                    <a  class="btn btnColor" href="/diputados">Volver</a>
                </div>
            </div>

            

  
        </div>
    
    </div>
@endauth


@endsection