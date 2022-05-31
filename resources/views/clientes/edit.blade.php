@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div>
<h2 class="text-white col-md-3" style="background:black">Editar Cliente</h2>
<form action="{{route('clientes.update',$clientes->cli_id)}}" method="POST">
    @csrf

<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
                 <div class="card">
           <div class="card-header">{{ __('Formulario de editar') }}</div>

                <div class="card-body">

         <div class="form-group row">
         <label for="cli_nombre" class="col-md-4 col-form-label text-md-right">Editar nombre</label>

               <div class="col-md-6">
                 <input id="cli_nombre" type="text" class="form-control @error('cli_nombre') is-invalid @enderror" name="cli_nombre" value="{{$clientes->cli_nombre}}" required autocomplete="cli_nombre" autofocus>

                                @error('cli_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

          <div class="form-group row">
                            <label for="cli_apellido" class="col-md-4 col-form-label text-md-right">Editar Apellido</label>

                            <div class="col-md-6">
                                <input id="cli_apellido" type="text" class="form-control @error('cli_apellido') is-invalid @enderror" name="cli_apellido" value="{{$clientes->cli_apellido}}" required autocomplete="cli_apellido" autofocus>

                                @error('cli_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                      <div class="form-group row">
                            <label for="cli_direccion" class="col-md-4 col-form-label text-md-right">Editar direccion</label>

                            <div class="col-md-6">
                                <input id="cli_direccion" type="text" class="form-control @error('cli_direccion') is-invalid @enderror" name="cli_direccion" value="{{$clientes->cli_direccion}}" required autocomplete="cli_direccion" autofocus>

                                @error('cli_direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="cli_telefono" class="col-md-4 col-form-label text-md-right">Editar telefono</label>

                            <div class="col-md-6">
                                <input id="cli_telefono" type="number" class="form-control @error('cli_telefono') is-invalid @enderror" name="cli_telefono" value="{{$clientes->cli_telefono}}" required autocomplete="cli_telefono" autofocus>

                                @error('cli_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="cli_cedula" class="col-md-4 col-form-label text-md-right">Editar cedula</label>

                            <div class="col-md-6">
                                <input id="cli_cedula" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{$clientes->cli_cedula}}" required autocomplete="cli_cedula" autofocus>

                                @error('cli_cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                              Editar
                                </button>
                            </div>
                        </div>

</form>
@endsection