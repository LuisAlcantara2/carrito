<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Categoria;
use App\Producto;

class CategoriaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $categoria=Categoria::
        where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('tablas/categorias/index',compact('categoria','buscarpor'));
    }
}
