@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Ventas</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <a href="{{ route('admin.inventories.create') }}" class="btn btn-primary mb-3">Añadir inventario</a>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-one-profile" role="tab"
                                        aria-controls="custom-tabs-one-profile" aria-selected="false">Profile</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered" id="sales_pendient_table">
                                                <thead>
                                                    <tr>
                                                        <th>Cliente</th>
                                                        <th>Usuario</th>
                                                        <th>total_venta</th>
                                                        <th>fecha_venta</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sales as $sale)
                                                        <tr>
                                                            <td>
                                                                <form action="{{ route('admin.sales.destroy', $sale->id) }}"
                                                                    id="delete_form" method="POST"
                                                                    onsubmit="return confirm('Esta seguro que desea eliminar el registro?')"
                                                                    style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="submit" class="btn btn-danger"
                                                                        value="Eliminar">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>



                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered" id="sales_success_table">
                                                <thead>
                                                    <tr>
                                                        <th>Cliente</th>
                                                        <th>Usuario</th>
                                                        <th>total_venta</th>
                                                        <th>fecha_venta</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sales as $sale)
                                                        <tr>
                                                            <td>
                                                                <form action="{{ route('admin.sales.destroy', $sale->id) }}"
                                                                    id="delete_form" method="POST"
                                                                    onsubmit="return confirm('Esta seguro que desea eliminar el registro?')"
                                                                    style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="submit" class="btn btn-danger"
                                                                        value="Eliminar">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            titulo = "Reporte de inventario";
            console.log(titulo);
            $('#sales_pendient_table').DataTable({
                responsive: true,
                autoWidth: false,
                scrollX: true
            });
            $('#sales_success_table').DataTable({
                responsive: true,
                autoWidth: false, 
                scrollX: true
            });
        });
    </script>
@endsection
