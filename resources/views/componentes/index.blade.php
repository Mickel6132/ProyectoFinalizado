@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-12">
<h2 class="text-white">Lista de componentes <a href="{{route('componentes.create')}}" class="btn btn-dark text-dark bg-info" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"/></svg> Nuevo</a></h2>



<table class="table table-dark table-bordered table-sm">
	

	
<th style="text-align: center">#</th>
<th style="text-align: center">Cliente</th>
<th style="text-align: center">Categoria</th>
<th style="text-align: center">Cantidad</th>
<th style="text-align: center">Detalle</th>
<th style="text-align: center">Precio</th>


@foreach($componentes as $comp)

<tr>

<td style="text-align: center" class="table-light text-dark">{{$loop->iteration}}</td>
<td style="text-align: center" class="table-light text-dark">{{$comp->cli_nombre}}</td>
<td style="text-align: center" class="table-light text-dark">{{$comp->cat_nombre}}</td>
<td style="text-align: center" class="table-light text-dark">{{$comp->comp_cantidad}}</td>
<td style="text-align: center" class="table-light text-dark">{{$comp->comp_detalle}}</td>
<td style="text-align: center" class="table-light text-dark">{{$comp->comp_precio}}</td>


<td class="table-light text-dark">
	<div class="row">
       <ul></ul>
	<a href="{{route('componentes.edit',$comp->comp_id)}}" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg></a>
     
	<div class="col-1 ">

	<form action="{{route('componentes.destroy',$comp->comp_id)}}" method="POST" onsubmit="return confirm('desea eliminar?')">
	@csrf
	<button class="btn btn-danger text-dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="10px">>License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></svg></button>
	
</form>

</div>
</td>

</tr>


@endforeach

</table>
@endsection