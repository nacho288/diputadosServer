@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">
        <div class="col col-lg-4">
            
            <div class="row">
                <div class="col">
                    <h4 class="display-4"><strong>Detalles de documento</span></h4>
                     <h3 class="text-secondary">Manual de usuario</h3>   
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h4>Descripcion:</h4>
                    <h5 class="text-justify">Los elevados costos del sistema de salud en Estados Unidos y los estándares de calidad
                       de algunos centros hospitalarios en México hacen que muchos estadounidenses crucen la
                       frontera para hacer turismo médico.</h5>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-dark" type="button">Editar</button>
                </div>
                <div class="col text-center">
                    <a  class="btn btn-dark" href="/documentos">Volver</a>
                </div>
            </div>

  




        </div>
    
    </div>
@endauth


@endsection