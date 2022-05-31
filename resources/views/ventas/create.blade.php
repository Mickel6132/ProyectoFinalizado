@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-md-12">
<h2 class="text-white ">Crear Ventas</h2>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Formulario Registro</title>
</head>
<body>
  <section class="form-register">
    <h4>Crear venta</h4>
    <form method="POST" action="{{route('ventas.store')}}">
      @csrf
    <input class="controls" type="text" name="ven_cantidad" id="ven_cantidad" placeholder="Ingrese Cantidad">
    <input class="controls" type="text" name="ven_detalle" id="ven_detalle" placeholder="Ingrese Detalle">
    <input class="controls" type="date" name="ven_fecha" id="ven_fecha" placeholder="Ingrese Fecha">
    <input class="controls" type="text" name="ven_precio" id="ven_precio" placeholder="Ingrese Precio">
   <button class="btn btn-info">Registrar</button>
  </section>

</div>

</body>
</html>
@endsection

