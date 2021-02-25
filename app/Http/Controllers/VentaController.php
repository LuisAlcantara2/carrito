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
        ->select('v.numero','v.fecha','v.total','c.nombre')
        ->paginate($this::PAGINATION);
        return view('tablas/ventas/index',compact('venta','buscarpor'));
    }
}
