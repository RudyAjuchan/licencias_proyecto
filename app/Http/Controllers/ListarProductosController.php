<?php

namespace App\Http\Controllers;

use App\Models\Licencias;
use Illuminate\Http\Request;
use PharIo\Manifest\License;

class ListarProductosController extends Controller
{
    public function listarWindows(){
        $licencias = Licencias::where('categoria_id',8)->get();
        return view('windows', compact('licencias'));
    }
    public function listarAntivirus(){
        $licencias = Licencias::where('categoria_id',10)->get();
        return view('antivirus', compact('licencias'));
    }
    public function listarOffice(){
        $licencias = Licencias::where('categoria_id',9)->get();
        return view('office', compact('licencias'));
    }
}

?>