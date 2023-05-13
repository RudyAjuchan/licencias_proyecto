<?php

namespace App\Http\Controllers;

use App\Models\Licencias;
use App\Models\Categorias;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class LicenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licencias = Licencias::all();
        $categorias = Categorias::all();
        return view('licencias', compact('licencias', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|max:2048'
        ]);

        //para mover imagen
        $imagen = $request->file('imagen')->store('public');
        $linkImagen = Storage::url($imagen);

        $licencias = new Licencias();
        $licencias->nombre = $request->nombre;
        $licencias->precio = $request->precio;
        $licencias->stock = $request->stock;
        $licencias->descripcion = $request->descripcion;
        $licencias->imagen = $linkImagen;
        $licencias->estado = $request->estado;
        $licencias->categoria_id = $request->categoria_id;
        $licencias->save();
        Alert::success('¡Correcto!','Los datos se guardaron con éxito');
        return redirect('licencias');
    }

    /**
     * Display the specified resource.
     */
    public function show(Licencias $licencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Licencias $licencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $licencias = Licencias::find($id);
        $licencias->delete();
        Alert::success('Alerta', 'Dato eliminado');
        return redirect('licencias');    
    }
}
