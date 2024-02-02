@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Cliente</h1>
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
                        <form method="POST" action="{{route('admin.clients.update', $client->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="name" class="required">Nombre del cliente </label>
                                    <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del cliente" value="{{old('name', $client->name)}}">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="email" class="required">Email del cliente </label>
                                    <input type="email" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Ingrese el email del cliente" value="{{old('email', $client->email)}}">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="phone" class="required">Teléfono del cliente</label>
                                    <input type="tel" name="phone" id="phone" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" placeholder="Ingrese el teléfono del cliente" value="{{old('phone', $client->phone)}}" pattern="[0-9]{4}-[0-9]{4}">
                                    @if ($errors->has('phone'))
                                    <span class="text-danger">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                                  
                                  
                               </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.clients.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Editar
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