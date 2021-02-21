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
    public function create()
    {
        return view('tablas/categorias.create');
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:30'
        ],
        [
            'descripcion.required'=>'Ingrese descripcion de categoria',
            'descripcion.max'=>'Maximo 30 caracteres para descripcion'
        ]);
        $categoria=new Categoria();
        $categoria->descripcion=$request->descripcion;
        $categoria->save();
        return redirect()->route('categoria.index')->with('datos','Registro Nuevo Guardado!!');
        
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $categoria=Categoria::findOrFail($id);
        return view('tablas/categorias.edit',compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:30'
        ],
        [
            'descripcion.required'=>'Ingrese descripcion de categoria',
            'descripcion.max'=>'Ingrese un maximo de 30 caracteres'
        ]);
        $categoria=Categoria::findOrFail($id);
        $categoria->descripcion=$request->descripcion;
        $categoria->save(); 
        return redirect()->route('categoria.index')->with('datos','Registro Actualizado');
    
    }
    public function confirmar($id)
    {
        $categoria=Categoria::findOrFail($id);
        return view('tablas/categorias.confirmar',compact('categoria'));
    }
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        DB::table('categoria')->where('codcategoria', '=', $id)->delete();
        $categoria->save();
        DB::table('producto')->where('codcategoria','=',$id)->delete();
        return redirect()->route('categoria.index')->with('datos','Registro Eliminado');
    }
}
