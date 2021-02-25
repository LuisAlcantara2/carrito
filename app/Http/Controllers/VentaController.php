<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Venta;

class VentaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $venta=DB::table('venta as v')->join('cliente as c','c.codcliente','=','v.codcliente')
        ->where('codventa','like','%'.$buscarpor.'%')
        ->select('v.codventa','v.numero','v.fecha','v.total','c.nombre')
        ->paginate($this::PAGINATION);
        return view('tablas/ventas/index',compact('venta','buscarpor'));
    }
    public function detalle($id)
    {
        $venta=DB::table('venta as v')->join('detalleventa as dv','dv.codventa','=','v.codventa')
        ->join('producto as p','p.codproducto','=','dv.codproducto')
        ->where('v.codventa','=',$id)
        ->select('p.nombre','dv.precio','dv.cantidad')
        ->paginate($this::PAGINATION);
        return view('tablas/ventas/detalle',compact('venta'));
    }
}
