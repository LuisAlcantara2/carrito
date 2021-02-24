<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Categoria;
use App\Producto;

class ProductoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $producto=Producto::where('nombre','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('tablas/productos/index',compact('producto','buscarpor'));
    }
    public function create()
    {
        $categoria=DB::table('categoria')->get();
        return view('tablas/productos.create',compact('categoria'));
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:30',
            'codcategoria'=>'required',
            'precio'=>'required|min:0',
            'stock'=>'required|min:0'
        ],
        [
            'descripcion.required'=>'Ingrese descripcion de producto',
            'descripcion.max'=>'Maximo 30 caracteres para descripcion',
            'codcategoria.required'=>'Seleccione categoria',
            'precio.required'=>'Ingrese precio',
            'precio.min'=>'Precio no puede ser negativo',
            'stock.required'=>'Ingrese stock',
            'stock.min'=>'Stock no puede ser negativo'
        ]);
        $producto=new Producto();
        $producto->nombre=$request->descripcion;
        $producto->codcategoria=$request->codcategoria;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Registro Nuevo Guardado!!');
        
    }
    public function show($id)
    {
        $producto = Producto::where('codproducto','=' ,$id)->first();
        return view('tablas/productos.show',compact('producto'));
    }
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $categoria=DB::table('categoria')->get();
        return view('tablas/productos.edit',compact('producto','categoria'));
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:30'
        ],
        [
            'descripcion.required'=>'Ingrese descripcion de producto',
            'descripcion.max'=>'Ingrese un maximo de 30 caracteres'
        ]);
        $producto=Producto::findOrFail($id);
        $producto->nombre=$request->descripcion;
        $producto->codcategoria=$request->codcategoria;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->save(); 
        return redirect()->route('producto.index')->with('datos','Registro Actualizado');
    
    }
    public function confirmar($id)
    {
        $producto=Producto::findOrFail($id);
        return view('tablas/productos.confirmar',compact('producto'));
    }
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        DB::table('producto')->where('codproducto', '=', $id)->delete();
        $producto->save(); 
        return redirect()->route('producto.index')->with('datos','Registro Eliminado');
    }
}
