<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Cliente;

class ClienteController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $cliente=Cliente::
        where('codcliente','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('tablas/clientes/index',compact('cliente','buscarpor'));
    }
    public function create()
    {
        return view('tablas/clientes.create');
    }
    public function store(Request $request)
    {
        $cliente=new Cliente();
        $cliente->nombre=$request->nombre;
        $cliente->direccion=$request->direccion;
        $cliente->rucdni=$request->rucdni;
        $cliente->email=$request->email;
        $cliente->password=$request->password;
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Registro Nuevo Guardado!!');
        
    }
    public function edit($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('tablas/clientes.edit',compact('cliente'));
    }
    public function update(Request $request, $id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->nombre=$request->nombre;
        $cliente->direccion=$request->direccion;
        $cliente->rucdni=$request->rucdni;
        $cliente->email=$request->email;
        $cliente->password=$request->password;
        $cliente->save(); 
        return redirect()->route('cliente.index')->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('tablas/clientes.confirmar',compact('cliente'));
    }
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        DB::table('cliente')->where('codcliente', '=', $id)->delete();
        $cliente->save(); 
        return redirect()->route('cliente.index')->with('datos','Registro Eliminado');
    }
    
}
