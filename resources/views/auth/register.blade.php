@extends('layouts.page')

@section('content')
<div class="row my-md-5"></div><div class="row my-md-5"></div>

<div class="row justify-content-center mt-5 animated fadeIn">

    <div class="col col-lg-4 px-3 bg-white rounded shadow">

        <div class="row">
            <div class="col mt-3">
                    <h2 class="blued mb-0">Registro de usuario</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <div class="col">
                <form method="POST"  action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input id="name" name="name" type="text" class="form-control" aria-describedby="email" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input id="email" name="email" type="email" class="form-control" aria-describedby="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password-confirm"  name="password_confirmation" placeholder="Confirmar contraseña">
                    </div>

                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <hr class="m-0">
                        </div>
                    </div>

                    <div class="row justify-content-center mb-3">
                        <div class="col text-center">
                            <button type="submit" class="btn btnColor mt-3">Enviar</button>
                        </div>
                        <div class="col text-center">
                            <a href="/" class="btn btnColor mt-3">Volver</a>
                        </div>

                    </div>
                </form>

                 @error('email')

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <hr class="mt-0">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <p class="text-danger m-0">El E-mail ingresado no es correcto</p>
                    </div>
                </div>

                @enderror

                @error('password')

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <hr>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <p class="text-danger m-0">Contraseña incorrecta</p>
                    </div>
                </div>

                @enderror

                @error('name')

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <hr>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <p class="text-danger mt-0 mb-3">Error en el campo nombre</p>
                    </div>
                </div>

                @enderror
                
            </div>
        </div>

    </div>

</div>
@endsection