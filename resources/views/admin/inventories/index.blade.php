@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Inventario</h1>
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('admin.inventories.create') }}" class="btn btn-primary mb-3">Añadir inventario</a>

                        <table class="table table-bordered" id="inventories_table">
                            <thead>
                                <tr>
                                    <th>Perfil</th>
                                    <th>Ancho</th>
                                    <th>Diametro del rin</th>
                                    <th>Marca</th>
                                    <th>Cantidad</th>
                                    <th>Usuario</th>
                                    <th>Fecha de orden</th>
                                        <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $inventory)
                                <tr>
                                    <td><h4><span class="badge badge-dark">{{optional($inventory->tire)->profile}}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">{{optional($inventory->tire)->width}}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">{{optional($inventory->tire)->rim_diameter}}</span></h4></td>
                                    <td><h4><span class="badge badge-primary">{{$inventory->tire->brand->name }}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">{{$inventory->quantity}}</span></h4></td>
                                    <td><h4><span class="badge badge-success">{{$inventory->user->name}}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">{{$inventory->order_date}}</span></h4></td>

                                    <td><h4><span class="badge badge-primary">{{optional($inventory->tire)->status}}</span></h4></td>
                                    <td>
                                        <form action="{{ route('admin.inventories.destroy', $inventory->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
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
@endsection
@section('scripts')

<script>
$(document).ready(function(){
    titulo = "Reporte de inventario";
    console.log(titulo);
   $('#inventories_table').DataTable({
       responsive: true,
       
   });    
});

   </script>
@endsection