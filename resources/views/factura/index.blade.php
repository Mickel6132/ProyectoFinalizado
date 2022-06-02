@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-12">
<h2 class=" text-white">Tabla de factura <a href="{{route('facturas.create')}}" class="btn btn-dark text-dark bg-info" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"/></svg> Nuevo</a></h2>

<form action="{{route('factura.search')}}" method="POST"  >
		@csrf
</h1>
                <div class="row">
                    <div class="col-md-4">
                        <input name="desde" value="{{$desde}}" type="date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input name="hasta" value="{{$hasta}}" type="date" class="form-control">
                    </div>
                      <div class="col-md-4">
                        <button class=" btn btn-success btn-md">Buscar</button>
                        <button value="btn_pdf" name="btn_pdf" class=" btn btn-danger btn-md">Reporte</button>
</div>
                </div>
            </form>

				   <table  class="table table-dark table-bordered table-sm table-condensed" style="margin-top:2%;">

	<tr>
<th style="text-align: center">#</th>
<th style="text-align: center">No</th>
<th style="text-align: center">Cliente</th>
<th style="text-align: center">Fecha</th>
<th style="text-align: center">Total</th>
<th style="text-align: center">Iva</th>
<th style="text-align: center">Descuento</th>
<th style="text-align: center">Observaciones</th>
<th style="text-align: center">Estado</th>
</tr>


@foreach($factura as $fac)

<tr>

<td style="text-align: center" class="table-light text-dark">{{$loop->iteration}}</td>
<td style="text-align: center" class="table-light text-dark">{{$fac->fac_no}}</td>
<td style="text-align: center" class="table-light text-dark">{{$fac->cli_nombre}}</td>
<td style="text-align: center" class="table-light text-dark">{{$fac->fac_fecha}}</td>
<td style="text-align: center" class="table-light text-dark">{{$fac->fac_total}}</td>
<td style="text-align: center" class="table-light text-dark">{{$fac->fac_iva}}</td>
<td style="text-align: center" class="table-light text-dark">{{$fac->fac_descuento}}</td>
<td style="text-align: center" class="table-light text-dark">{{$fac->fac_observaciones}}</td>
  @if($fac->fac_estado==1)
   

  <td>

      <a href="{{route('facturas.pdf',$fac->fac_id)}}" method="POST" style="margin-left:25%;"  class="btn btn-danger">PDF</a>
<a href="{{route('facturas.edit',$fac->fac_id)}}" class="btn btn-info "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="12"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg></a>
 </td>

<td>
  <a href="{{route('factura.anular',$fac->fac_id)}}" style="margin-left:20% " class="btn btn-danger">Anular</a>
</td>
@else
    <td>Anulado</td>
    <td>
      <a href="{{route('facturas.pdf',$fac->fac_id)}}" class="btn btn-danger btn-sm">PDF</a>
    </td>
    @endif
</tr>
@endforeach
                       </table>
                  </div>
              </div>
           </div>

@endsection