@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div>
<h2 class="text-white col-md-3" style="background:black">Crear Cliente</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulario Clientes') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('clientes.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="cli_nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="cli_nombre" type="text" class="form-control @error('cli_nombre') is-invalid @enderror" name="cli_nombre" value="{{ old('cli_nombre') }}" required autocomplete="cli_nombre" autofocus>

                                @error('cli_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_apellido" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input id="cli_apellido" type="cli_apellido" class="form-control @error('cli_apellido') is-invalid @enderror" name="cli_apellido" value="{{ old('cli_apellido') }}" required autocomplete="cli_apellido">

                                @error('cli_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                       <div class="form-group row">
                            <label for="cli_direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>

                            <div class="col-md-6">
                                <input id="cli_direccion" type="cli_direccion" class="form-control @error('cli_direccion') is-invalid @enderror" name="cli_direccion" value="{{ old('cli_direccion') }}" required autocomplete="cli_direccion">

                                @error('cli_direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="cli_telefono" type="number" class="form-control @error('cli_telefono') is-invalid @enderror" name="cli_telefono" value="{{ old('cli_telefono') }}" required autocomplete="cli_telefono">

                                @error('cli_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_cedula" class="col-md-4 col-form-label text-md-right">Cedula</label>

                            <div class="col-md-6">
                                <input id="cli_cedula" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula">

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
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection