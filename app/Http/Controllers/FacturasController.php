<?php

namespace App\Http\Controllers;
use DB;
use App\Factura;
use App\Clientes;
use App\componentes;
use App\Detalle;
use Illuminate\Http\Request;
use PDF;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {

        $data=$req->all();
        $desde=date('Y-m-d');
        $hasta=date('Y-m-d');

         if(isset($data['desde'])){
             $desde=$data['desde'];
              $hasta=$data['hasta'];
         }
    //   $factura=DB::select("
    // SELECT * FROM Factura f
    // JOIN clientes c
    // ON f.cli_id=c.cli_id
    //    ");
    //       return view('factura.index')
    //       ->with('factura',$factura);
            $factura=DB::select("
              SELECT
              f.fac_no,
              f.cli_id,
              f.fac_fecha,
              f.fac_id,
              f.fac_iva,
              f.fac_total,
              f.fac_descuento,
              f.fac_estado,
              f.fac_observaciones,
              SUM(fd.fad_vt) AS total,
              c.*
              FROM factura f
              JOIN clientes c ON f.cli_id=c.cli_id
              JOIN factura_detalle fd ON f.fac_id=fd.fac_id
              WHERE f.fac_fecha BETWEEN '$desde' AND '$hasta'
              GROUP BY f.fac_no,f.cli_id,f.fac_fecha,f.fac_id,f.fac_estado

                ");

            if(isset($data['btn_pdf'])){
                $data=['factura'=>$factura];
                $pdf=PDF::loadView('factura.reporte',$data);
                return $pdf->stream('reporte.pdf');
            }
            return view('factura.index')
            ->with('factura',$factura)
            ->with('desde',$desde)
            ->with('hasta',$hasta);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
         $factura=DB::select("
           SELECT * FROM  Factura f
           JOIN clientes c
           ON f.cli_id=c.cli_id


            ");
 
        $clientes=Clientes::all();
        $componentes=componentes::all();
         return view('factura.create')
         ->with('clientes',$clientes)
        ->with('componentes',$componentes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             $data=$request->all();
        $factura=Factura::create($data);
        return redirect(route('facturas.edit',$factura->fac_id));
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $factura=factura::find($id);
        $clientes=clientes::all();
         $componentes=componentes::all();
         $detalle=DB::select("
            SELECT * FROM factura_detalle fd 
             JOIN componentes c 
            ON fd.comp_id=c.comp_id
            WHERE fd.fac_id=$id
             ");
         return view("factura.edit")
         ->with('factura',$factura)
         ->with('clientes',$clientes)
          ->with('componentes',$componentes)
          ->with('detalle',$detalle);
     
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

             
    }

     public function detalle(Request $req)
{
  
$datos=$req->all();
$fac_id=$datos['fac_id'];

if(isset($datos['btn_detalle'])=='btn_detalle'){
  Detalle::create($datos);
}

if(isset($datos['btn_eliminar'])>0){
   $fad_id=$datos['btn_eliminar'];
   Detalle::destroy($fad_id);
}  
       //
return redirect(route('facturas.edit',$fac_id));

//$datos['fad_vt']
}

public function facturas_pdf($fac_id){


    $factura=DB::select("
            SELECT * FROM factura f
            JOIN clientes c ON c.cli_id=f.cli_id

            WHERE f.fac_id=$fac_id
            ");

        $detalle=DB::select("
            SELECT * FROM factura_detalle d 
            JOIN componentes c ON c.comp_id=d.comp_id
            WHERE d.fac_id=$fac_id
            ");
        //dd($factura);
        $pdf=PDF::loadView('factura.pdf',['factura'=>$factura[0],'detalle'=>$detalle]);
        return $pdf->stream('factura.pdf');
}
    
    



   


   public function factura_anular ($fac_id)

       {
       DB::update("UPDATE factura SET fac_estado=2 where fac_id=$fac_id");
        return redirect(route('factura.index'));
        }
   

   



}

