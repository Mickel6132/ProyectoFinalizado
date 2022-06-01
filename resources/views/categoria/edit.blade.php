@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-md-12">
<h2 class="text-white ">Editar Categoria</h2>

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
    <h4 class="text-dark">Editar Categoria</h4>
    <form method="POST" class="text-dark" action="{{route('categoria.update',$categoria->cat_id)}}">
      @csrf
      Nombre
    <input class="controls" type="text" name="cat_nombre" id="cat_nombre" required="" value="{{$categoria->cat_nombre}}" placeholder="">
   
   <button class="btn btn-info">Editar
   </button>
  </section>

</div>

</body>
</html>
@endsection
