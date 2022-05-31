@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div>
<h2 class="text-white col-md-3" style="background:black">Editar Usuarios</h2>
<form action="{{route('usuarios.update',$usuarios->usu_id)}}" method="POST">
    @csrf

<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
                 <div class="card">
           <div class="card-header">{{ __('Formulario de editar') }}</div>

                <div class="card-body">

         <div class="form-group row">
         <label for="usu_nombre" class="col-md-4 col-form-label text-md-right">Editar nombre</label>

               <div class="col-md-6">
                 <input id="usu_nombre" type="text" class="form-control @error('usu_nombre') is-invalid @enderror" name="usu_nombre" value="{{$usuarios->usu_nombre}}" required autocomplete="usu_nombre" autofocus>

                                @error('usu_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

          <div class="form-group row">
                            <label for="usu_email" class="col-md-4 col-form-label text-md-right">Editar Email</label>

                            <div class="col-md-6">
                                <input id="usu_email" type="text" class="form-control @error('usu_email') is-invalid @enderror" name="usu_email" value="{{$usuarios->usu_email}}" required autocomplete="usu_email" autofocus>

                                @error('usu_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                      <div class="form-group row">
                            <label for="usu_cedula" class="col-md-4 col-form-label text-md-right">Editar Cedula</label>

                            <div class="col-md-6">
                                <input id="usu_cedula" type="number" class="form-control @error('usu_cedula') is-invalid @enderror" name="usu_cedula" value="{{$usuarios->usu_cedula}}" required autocomplete="usu_cedula" autofocus>

                                @error('usu_cedula')
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