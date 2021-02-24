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
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Registro Nuevo Guardado!!');
        
    }
}
