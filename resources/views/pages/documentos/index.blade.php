@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-md-6 col-lg-5 bg-white rounded shadow">

            
            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col col-auto mt-3">
                    <h2 class="blued mb-0">Listado de documentos</h2>
                </div>
                <div class="col col-auto mt-3 text-right">
                    <a class="btn btn-sm btnColor" href="/documentos/create">Agregar</a>
                </div>
            </div>

            @if (count($documentos) != 0)

            <div class="row mt-0">
                <div class="col">
                    <hr class="mb-0">
                </div>
            </div>
            
            <div class="row justify-content-center mt-3 mb-4">
                <div class="col">
                    <table class="table mb-0" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                            <tr>
                                <td>{{  $documento->nombre }}</td>
                                <td>
                                    <a href="/documentos/{{  $documento->id }}" class="badge btnColor">Detalles</a>
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

                <div class="row mt-1 mb-3">
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