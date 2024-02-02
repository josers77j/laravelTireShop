@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva llanta</h1>
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

                        <form method="POST" action="{{route('admin.tires.store')}}">
                            @csrf
                     <div class="row">
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="profile" class="required">Perfil</label>
                            <input type="number" name="profile" id="profile" class="form-control {{$errors->has('profile') ? 'is-invalid' : ''}}" placeholder="Ingrese el perfil de la llanta" value="{{old('profile', '')}}">
                            @if ($errors->has('profile'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('profile') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="width" class="required">Ancho</label>
                            <input type="number" name="width" id="width" class="form-control {{$errors->has('width') ? 'is-invalid' : ''}}" placeholder="Ingrese el ancho de la llanta" value="{{old('width', '')}}">
                            @if ($errors->has('width'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('width') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="rim_diameter" class="required">Diametro del rin</label>
                            <input type="number" name="rim_diameter" id="rim_diameter" class="form-control {{$errors->has('rim_diameter') ? 'is-invalid' : ''}}" placeholder="Ingrese el diametro del rin para la llanta" value="{{old('rim_diameter', '')}}">
                            @if ($errors->has('rim_diameter'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('rim_diameter') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="description" class="required">Descripcion</label>
                            <textarea name="description" class="form-control">{{old('description', '')}}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="quantity" class="required">Cantidad</label>
                            <input type="number" name="quantity" id="quantity" class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}" placeholder="Ingrese la cantidad de producto a ingresar" value="{{old('quantity', '')}}">
                            @if ($errors->has('quantity'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="purchase_price" class="required">Precio de compra</label>
                            <input type="number" name="purchase_price" id="purchase_price" class="form-control {{$errors->has('purchase_price') ? 'is-invalid' : ''}}" placeholder="Ingrese el precio de compra" value="{{old('purchase_price', '')}}">
                            @if ($errors->has('purchase_price'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('purchase_price') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="sale_price" class="required">Precio de venta</label>
                            <input type="number" name="sale_price" id="sale_price" class="form-control {{$errors->has('sale_price') ? 'is-invalid' : ''}}" placeholder="Ingrese el precio de venta" value="{{old('sale_price', '')}}">
                            @if ($errors->has('sale_price'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('sale_price') }}</strong>
                            </span>
                            @endif
                        </div>
                   
                        <div class="form-group col-lg-3">
                            <label for="acquisition_date" class="required">Fecha de adquisicion</label>
                            <input name="acquisition_date" type="text" class="form-control date" value="{{old('acquisition_date')}}">
                            <span class="text-danger">
                                <strong>{{ $errors->first('acquisition_date') }}</strong>
                            </span>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="client_id" class="required">Marca</label>
                            <select class="form-control select2" name="brand_id" style="width: 100%;">
                                <option value="">Seleccione una marca</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{old('brand_id') == $brand->id ? 'selected' : ''}}>
                                    {{ $brand->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('brand_id'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('brand_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="category_id" class="required">Categoria</label>
                            <select class="form-control select2" name="category_id" style="width: 100%;">
                                <option value="">Seleccione una categoria</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <input type="hidden" name="user_id" value="{{ $userID }}">
                        <div class="form-group col-lg-4">
                            <label for="status">Estado de la llanta</label>
                            <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                                <option value="">Seleccione un status</option>
                                @foreach(App\Models\Tire::STATUS as $status)
                                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                            <div class="text-danger">
                                {{ $errors->first('status') }}
                            </div>
                            @endif
                        </div>
                     </div>
                          
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.tires.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar
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