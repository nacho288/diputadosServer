@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
      <div class="row justify-content-center mt-5 animated fadeIn mb-5">

        <div class="col col-auto bg-white rounded shadow-sm">

            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Listado de empleados</h2>
                </div>
                <div class="col col-auto mt-3 text-right">
                    <a class="btn btn-sm btnColor" href="/empleados/create">Agregar</a>
                </div>
            </div>

            @if (count($empleados) != 0)

            <div class="row mt-0">
                <div class="col">
                    <hr class="my=0">
                </div>
            </div>

            <div class="row justify-content-center mt-1 mb-3">
                <div class="col">
                    <table  id="example" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Empleado</th>
                                <th scope="col ml-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                            <tr>
                                <td><img class="rounded-circle mr-3" height="40" width="40"
                                    @if ($empleado->foto)
                                    src="{{$empleado->foto}}" 
                                    @else
                                    src="{{ URL::asset('img/avatar.jpg') }}"
                                    @endif
                                    alt=""><b class="mr-4">{{  $empleado->apellido }} {{  $empleado->nombre }}</b></td>
                                <td>
                                    <a href="/empleados/{{  $empleado->id }}" class="ml-4 badge btnColor">Detalles</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <div class="row mt-0">
                    <div class="col">
                        <hr>
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <div class="col text-center">
                        <h4 class="text-secondary font-italic">Ningún elemento registrado</h4>
                    </div>
                </div>
            @endif

        </div>

    </div>

@endauth

@endsection

@push('extra-script')
    <script>
    $(document).ready(function() {

        $('#example').DataTable({
            "searching": true,
            'columnDefs': [ {
                'targets': 1, /* column index */
                'orderable': false, /* true or false */
            }],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },


        }});
    
    });
    </script>
@endpush