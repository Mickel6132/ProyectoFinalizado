@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div>
<h2 class="text-white col-md-3" style="background:black">Editar Componentes</h2>

<form action="{{route('componentes.update',$componentes->comp_id)}}" method="POST">
    @csrf

<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
                             <div class="card">
           <div class="card-header">{{ __('Formulario de editar') }}</div>

                <div class="card-body">

                         <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Editar Cliente</label>

                            <div class="col-md-6">

                                <select name="cli_id" id="cli_id" class="form-control ">
                                    @foreach($clientes as $cli)}
                                    <option value="{{$cli->cli_id}}">{{$cli->cli_nombre}}</option>
                                    @endforeach
                                </select>

                                @error('comp_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                   <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Editar Categoria</label>

                            <div class="col-md-6">

                                <select name="cat_id" id="cat_id" class="form-control ">
                                    @foreach($categoria as $cat)}
                                    <option value="{{$cat->cat_id}}">{{$cat->cat_nombre}}</option>
                                    @endforeach
                                </select>

                                @error('cat_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

          <div class="form-group row">
                            <label for="comp_cantidad" class="col-md-4 col-form-label text-md-right">Editar Cantidad</label>

                            <div class="col-md-6">
                                <input id="comp_cantidad" type="number" class="form-control @error('comp_cantidad') is-invalid @enderror" name="comp_cantidad" value="{{$componentes->comp_cantidad}}" required autocomplete="comp_cantidad" autofocus>

                                @error('comp_cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                      <div class="form-group row">
                            <label for="comp_detalle" class="col-md-4 col-form-label text-md-right">Editar detalle</label>

                            <div class="col-md-6">
                                <input id="comp_detalle" type="text" class="form-control @error('comp_detalle') is-invalid @enderror" name="comp_detalle" value="{{$componentes->comp_detalle}}" required autocomplete="comp_detalle" autofocus>

                                @error('comp_detalle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="comp_precio" class="col-md-4 col-form-label text-md-right">Editar precio</label>

                            <div class="col-md-6">
                                <input id="comp_precio" type="number" class="form-control @error('comp_precio') is-invalid @enderror" name="comp_precio" value="{{$componentes->comp_precio}}" required autocomplete="comp_precio" autofocus>

                                @error('comp_precio')
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