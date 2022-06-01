<?php

namespace App\Http\Controllers;

use App\Componentes;
use Illuminate\Http\Request;
use App\Clientes;
use App\Categoria;
use DB;
class ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              
        // $componentes=Componentes::all();
        // $clientes=Clientes::all();
        // $categoria=Categoria::all();
        $componentes=DB::select("SELECT * FROM componentes t
              JOIN clientes c ON t.cli_id=c.cli_id
              JOIN categoria a ON t.cat_id=a.cat_id
                ");
        return view('componentes.index')
        ->with('componentes',$componentes)
        ;
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes=Clientes::all();
        $categoria=Categoria::all();
          return view('componentes.create')
          ->with('clientes',$clientes)
          ->with('categoria',$categoria);
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
        Componentes::create($data);
        return redirect(route('componentes'));
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
        $componentes=Componentes::find($id);
        $clientes=Clientes::all();
        $categoria=Categoria::all();
        return view('componentes.edit')
        ->with('componentes',$componentes)
        ->with('clientes',$clientes)
        ->with('categoria',$categoria);
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
        
            $componentes=Componentes::find($id);

        $componentes->update($request->all());
        return redirect(route('componentes')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
              Componentes::destroy($id);
        return redirect(route('componentes'));
    }
}
