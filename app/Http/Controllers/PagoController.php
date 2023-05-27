<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Detalle_ventas;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notificacion;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('procesoPago');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venta = new Ventas();

        $datos = json_decode(stripslashes($request->carrito_content),true);

        $total=0;
        foreach($datos as $D){
            $total+=floatval($D['precio']);
        }
        $venta->total = $total;
        $venta->nombre_cliente = $request->nombre;
        $venta->save();
        $id_venta=$venta->id;
        $correo=$request->correo;

        foreach($datos as $DC){
            $detalle_venta = new Detalle_ventas();
            
            $detalle_venta->cantidad=$DC['cantidad'];
            $detalle_venta->total=$DC['precio'];  
            $detalle_venta->venta_id=$id_venta;          
            $detalle_venta->licencia_id=$DC['id'];
            $detalle_venta->save();            
        }
        Mail::to($correo)->send(new Notificacion);
        Alert::success('¡Correcto!','Los datos se guardaron con éxito');
        return redirect('windows');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
