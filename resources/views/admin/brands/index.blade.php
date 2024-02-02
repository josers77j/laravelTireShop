@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listado de marcas</h1>
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
                <a href="{{ route('admin.brands.create') }}" class="btn btn-primary mb-3">Nueva Marca</a>
                  <div class="card">
                      <div class="card-body ">
   
                          <table class="table table-bordered" id="category_table">
                              <thead>
                                  <tr>
                                      <th>Nombre</th>
                                      <th>Descripcion</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($brands as $brand)
                                  <tr>
                                      <td><h4><span class="badge badge-primary">{{$brand->name}}</span></h4></td>
                                      <td><h4 class="font-weight-normal">{{$brand->description}}</h4></td>
                                      <td>
                                       <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: max-content;">
                                                <a href="{{ route('admin.brands.edit', $brand->id)}}" class="dropdown-item">Editar</a>
                                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" id="delete_form" method="POST" onsubmit="return confirm('¿Está seguro que desea eliminar el registro?')" >
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
    $('#category_table').DataTable({
        responsive: true,
        
    });    
});
</script>
@endsection
