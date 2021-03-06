@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col mx-sm-2 col-md-8 col-lg-7 bg-white rounded shadow-sm">

            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Listado de eventos</h2>
                </div>
                <div class="col mt-3 text-right">
                    <a class="btn btn-sm btnColor" href="/eventos/create">Agregar</a>
                </div>
            </div>

            @if (count($eventos) != 0)

                <div class="row mt-3">
                    <div class="col">
                        <hr class=" my-0">
                    </div>
                </div>

                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col px-3">
                        <table class="table " id="example" >
                            <thead>
                                <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Inicia en</th>
                                    <th scope="col">finaliza en</th>
                                    <th scope="col">Destacado</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventos as $evento)
                                <tr>
                                    <th>{{  $evento->titulo }}</th>
                                    <td>{{  $evento->desde }}</td>
                                    <td>{{  $evento->hasta }}</td>
                                    @if ( $evento->destacado )
                                        <td>Si</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    <td>
                                        <a href="/eventos/{{  $evento->id }}" class="badge btnColor badgeSize">Detalles</a>
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

                <div class="row mt-3 mb-4">
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
            "order": [[ 1, "desc" ]],
            'columnDefs': [ {
                'targets': 3, /* column index */
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