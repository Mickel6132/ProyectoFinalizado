
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


<h4 class="bg-dark text-white" align="center">PDF reporte</h4>
<table class="table table- table-striped">
	
		<th>*</th>
		<th>No</th>
		<th>Nombre</th>
		<th>Fecha</th>
		<th><T>Total</T></th>
		<?php
         $t_saldo=0;
         $x=1;

		?>
@foreach ($factura as $fac)
@if($fac->fac_estado==1)
<?php
$t_saldo+=$fac->total;
?>
<tr>
	<td style="text-align: left;">{{$x++}}</td>
	<td style="text-align: center;">{{$fac->fac_no}}</td>
	<td style="text-align: center;">{{$fac->cli_nombre}}</td>
	<td style="text-align: center;">{{$fac->fac_fecha}}</td>
	<td style="text-align: right;">{{number_format($fac->total,2)}}$</td>
@endif
</tr>
@endforeach
<td colspan="4">Total</td>
<td>Saldo:${{number_format($t_saldo)}}</td>



</table>