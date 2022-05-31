@extends('layouts.app')
@section('content')
<?php 
if (isset($factura)) {
  $fac_id=$factura->fac_id;
  $cli_id=$factura->cli_id;
  $fac_no=$factura->fac_no;
  $fac_fecha=$factura->fac_fecha;
  $fac_iva=$factura->fac_iva;
  $fac_descuento=$factura->fac_descuento;
  $fac_observaciones=$factura->fac_observaciones;
  $fac_estado=$factura->fac_estado;
  $fac_total=$factura->fac_total;
}else{
  $fac_id="";
  $cli_id="";
  $fac_no="";
  $fac_fecha=date("Y-m-d");
  $fac_iva=0;
  $fac_descuento=0;
  $fac_observaciones="";
  $fac_estado="";
  $fac_total=0;
}

 ?>
<div class="container">
         <div class="row">
            <div class="col-md-9">
                <div style="width:900px" class="card mb-6 border-dark">
                    <div class="card-body">
   <h4 class="bg-dark text-white" align="center">Facturacion</h4>
      <form action="{{route('facturas.store')}}" method="POST" onsubmit="return validar()">

        @csrf
         <h4 for="">Clientes</h4>
                     <select name="cli_id" id="cli_id" class="form-control">
                         <option value="">Elije un Cliente</option>
                         @foreach($clientes as $c)
                         @if($c->cli_id==$cli_id)
                         <option selected value="{{$c->cli_id}}"> {{$c->cli_nombre}} </option>
                         @else
                         <option value="{{$c->cli_id}}"> {{$c->cli_nombre}} </option>
                         @endif
                         @endforeach


        </select>  
        <p>  
 <div class="form-floating mb-3">
  <input type="text" value="{{$fac_no}}" class="form-control" id="fac_no" name="fac_no" placeholder="">
  <label for="floatingInput">Numero de Factura</label>
</div>
<div class="form-floating mb-3">
  <input type="date" value="{{$fac_fecha}}" class="form-control" id="fac_fecha" name="fac_fecha" placeholder="">
  <label for="floatingInput"> Fecha</label>
</div>
<div class="form-floating mb-3">
  <input type="text" value="{{$fac_iva}}" class="form-control" id="fac_iva" name="fac_iva" placeholder="">
  <label for="floatingInput">Iva</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" value="{{$fac_descuento}}" id="fac_descuento" name="fac_descuento" placeholder="">
  <label for="floatingInput">Descuento</label>
</div>
<div class="form-floating mb-3">
  <input type="text" value="{{$fac_observaciones}}" class="form-control" id="fac_observaciones" name="fac_observaciones" placeholder="">
  <label for="floatingInput">Observaciones</label>
</div>
<div class="form-floating mb-3">
  <input type="text" value="{{$fac_estado}}" class="form-control" id="fac_estado" name="fac_estado" placeholder="">
  <label for="floatingInput">Estado</label>
</div>
<div class="form-floating mb-3">
  <input type="text" value="{{$fac_total}}" class="form-control" id="fac_total" name="fac_total" placeholder="">
  <label for="floatingInput">Total</label>
</div>
<div class="d-grid gap-2 col-2 mx-auto">
     <button type="submit" style="background:#c0a0c3 " class="btn ">Guardar</button>
     </div>
                                                                                                                                                                                                                                                                                                                                                                         
     </form>
     <p>
      <form action="{{route('factura.detalle')}}" method="POST">
        @csrf
     <div class="container">
<h4 class="bg-dark text-white" align="center">Detalle</h4>      

  <table class="table">
    
<tr>
  <th> # </th>
     <th> Cantidad </th>
     <th>Producto</th>
     <th>Vu</th>
     <th>Vt</th>
     <th>...</th>
   </tr>
   <td></td>
      
     <td>
      <input id="fac_id" name="fac_id" value="{{$fac_id}}" type="hidden">
       <input type="number" name="fad_cantidad" id="fad_cantidad" style="width:150px" class="form-control">
     </td>
     <td>
       
      <select name="comp_id" id="comp_id" style="width: 200px" class="form-control">
        <option value="">Componentes</option>
       @foreach($componentes  as  $comp)
        <option value="{{$comp->comp_id}}">{{$comp->comp_detalle}}</option>
        @endforeach
      </select>
     
     </td>
     <td>
       <input type="number" name="fad_vu" id="fad_vu" style="width:100px" class="form-control">
     </td>
     <td>
       <input type="text" value="0" name="fad_vt" id="fad_vt" style="width:100px" readonly="" class="form-control">
     </td>
     <td>
     <button type="submit" class="btn btn-info" name="btn_detalle" value="btn_detalle">+</button>
   </td>
   

  @isset($detalle)
     <?php 
        $subt=0;
     ?>
           @foreach($detalle as $dat)

           <?php 
           $subt+=$dat->fad_vt;
           ?>
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$dat->fad_cantidad}}</td>
                     <td>{{$dat->comp_detalle }}</td>
                <td class="text-right">{{number_format($dat->fad_vu,2)}}$</td>
                <td class="text-right">{{number_format($dat->fad_vt,2)}}$</td>
                <td>
                  <button class="btn btn-danger btn-sm" name="btn_eliminar" value="{{$dat->fad_id}}" >Del</button>
                </td>
              </tr>
           @endforeach
           <?php 
           $desc=$fac_descuento*$subt;
           $fva=$subt*0.12;
              $vt=($subt-$desc)+$fva;
           ?>
           <tr>
                <td colspan="4" class="text-right">Subt:</td>
                <td class="text-right">{{number_format($subt,2)}}$</td>
           </tr>
           <tr>
                <td colspan="4" class="text-right">Desc:</td>
                <td class="text-right">{{number_format($desc,2)}}$</td>
           </tr>
           <tr>
                <td colspan="4" class="text-right">IVA:</td>
                <td class="text-right">{{number_format($fva,2)}}$</td>
           </tr>
           <tr>
                <td colspan="4" class="text-right">VT:</td>
                <td class="text-right">{{number_format($vt,2)}}$</td>
           </tr>
        @else
        <tr><th colspan="5" class="alert alert-warning">No existen datos</th></tr>
        @endisset

  </table>
</form>
<script>
window.onload = function(){
      const obj_cant=document.querySelector("#fad_cantidad");
      const obj_vu=document.querySelector("#fad_vu");
      obj_cant.addEventListener("change",()=>{
        calculos();
      });
      obj_vu.addEventListener("change",()=>{
        calculos();
      });

}

const calculos=()=>{
        const vc=document.querySelector("#fad_cantidad");
        const vu=document.querySelector("#fad_vu");
        const vt=vc.value*vu.value;
        document.querySelector("#fad_vt").value=vt;

}

</script>
</div>
</form>
</p>
</p>
</form>

  </table>
</div>
</div>
 </div>
</div>
</div>
</form>

     </div>

</div>
 </div>
</div>
</div>


@endsection