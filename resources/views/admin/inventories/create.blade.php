@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo inventario</h1>
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

                        <form method="POST" action="{{route('admin.inventories.store')}}">
                            @csrf
                            <div class="row">
                            <div class="form-group col-lg-12">
                                <label for="tire_id" class="required">Llanta</label>
                                <select class="form-control select2" name="tire_id" style="width: 100%;">
                                    <option value="">Seleccione una llanta</option>
                                    @foreach ($tire as $tire)
                                    <option value="{{ $tire->id }}" {{old('tire_id') == $tire->id ? 'selected' : ''}}>
                                        {{ $tire->brand->name }} - Perfil: {{ $tire->profile }} - Ancho: {{ $tire->width }} - Diametro del rin: {{ $tire->rim_diameter }} - Estado: {{ $tire->status }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tire_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('tire_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-lg-6 col-sm-6">
                                <label for="quantity" class="required">Cantidad</label>
                                <input type="number" name="quantity" id="quantity" class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}" placeholder="Ingrese la cantidad de producto a ingresar" value="{{old('quantity', '')}}">
                                @if ($errors->has('quantity'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                                @endif
                            </div>
                            <input type="hidden" name="user_id" value="{{ $userID }}">
                            <div class="form-group col-lg-6">
                                <label for="order_date" class="required">Fecha de adquisicion</label>
                                <input name="order_date" type="text" class="form-control date" value="{{old('order_date')}}">
                                <span class="text-danger">
                                    <strong>{{ $errors->first('order_date') }}</strong>
                                </span>
                            </div>
                          
                        </div>
                         
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.inventories.index')}}">
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