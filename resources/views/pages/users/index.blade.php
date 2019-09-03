@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')
    <div class="row justify-content-center animated fadeIn mt-5">
        <div class="col col-lg-6 bg-white rounded shadow">

            <div class="row justify-content-center mt-3 animated fadeIn">
                <div class="col">
                    <h2 class="blued mb-0">Usuario</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <hr>
                </div>
            </div>

            {{ Aire::open()->route('users.store') }}
            <div class="row">
                <div class="col-md-6">
                    {{ Aire::input('name', 'Nombre') }}

                    {{ Aire::email('email', 'Email') }}

                </div>
                <div class="col-md-6">
                    {{ Aire::password('password', 'Contraseña') }}

                    {{ Aire::password('confirm_password', 'Confirmar contraseña') }}
                </div>
                <div class="col-md-6">

                    {{ Aire::submit('Enviar')->addClass('btnColor') }}
                </div>
            </div>
            {{ Aire::close() }}
        </div>
    </div>
@endsection
