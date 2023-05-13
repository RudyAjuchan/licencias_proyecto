<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $categorias = Categorias::all();
        return view('categorias', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorias = new Categorias();
        $categorias->nombre = $request->nombre;
        $categorias->save();
        Alert::success('¡Correcto!','Los datos se guardaron con éxito');
        return redirect('categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorias = Categorias::find($id);
        return view('editCategoria', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        $categorias = Categorias::find($id);
        $categorias->nombre = $request->nombre;
        $categorias->save();
        Alert::success('¡Correcto!','Los datos se guardaron con éxito'.$request->name);
        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorias = Categorias::find($id);
        $categorias->delete();
        //Alert::success('Alerta', 'Dato eliminado'.$categorias);
        return redirect('categorias');        

    }
}
