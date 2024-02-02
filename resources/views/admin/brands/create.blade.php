@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva Marca</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{route('admin.brands.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="required">Marca</label>
                                <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Ingrese una marca" value="{{old('name', '')}}">
                                @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description" class="required">Descripcion </label>
                                <input type="text" name="description" id="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Ingrese una descripcion" value="{{old('description', '')}}">
                                @if ($errors->has('description'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                     
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.brands.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection