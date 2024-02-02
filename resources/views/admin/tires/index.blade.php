@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Llantas</h1>
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

                        <a href="{{ route('admin.tires.create') }}" class="btn btn-primary mb-3">Nueva llanta</a>

                        <table class="table table-bordered" id="tires_table">
                            <thead>
                                <tr>
                                    <th>Perfil</th>
                                    <th>Ancho</th>
                                    <th>Diametro del rin</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Precio de compra</th>
                                    <th>Precio de venta</th>
                                    <th>Fecha de adquisicion</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tires as $tire)
                                <tr>
                                    <td><h4><span class="badge badge-dark">{{$tire->profile}}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">{{$tire->width}}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">{{$tire->rim_diameter}}</span></h4></td>
                                    <td><h4 class="font-weight-normal">{{$tire->description}}</h4></td>
                                    <td><h4><span class="badge badge-dark">{{$tire->quantity}}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">${{$tire->purchase_price}}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">${{$tire->sale_price}}</span></h4></td>
                                    <td><h4><span class="badge badge-dark">{{$tire->acquisition_date}}</span></h4></td>
                                    <td><h4><span class="badge badge-primary">{{$tire->brand->name}}</span></h4></td>
                                    <td><h4><span class="badge badge-primary">{{$tire->category->name}}</span></h4></td>
                                    <td><h4><span class="badge badge-success">{{$tire->user->name}}</span></h4></td>
                                    <td><h4><span class="badge badge-primary">{{$tire->status}}</span></h4></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: max-content;">
                                                <a href="{{ route('admin.tires.edit', $tire->id)}}" class="dropdown-item">Editar</a>
                                                <form action="{{ route('admin.tires.destroy', $tire->id) }}" id="delete_form" method="POST" onsubmit="return confirm('¿Está seguro que desea eliminar el registro?')" >
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="dropdown-item btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
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
   $('#tires_table').DataTable({
       responsive: true,
       
   });    
});
   </script>
@endsection