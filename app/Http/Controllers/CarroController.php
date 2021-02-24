<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class CarroController extends Controller
{
    public function __construct(){
        if(!\Session::has('carro')) \Session::put('carro',array());
    }
    //show,add,delete,update,trash,total
    public function show(){
        $carro = \Session::get('carro');
        $total = $this->total();
        return view('tablas/carro.cart',compact('carro','total'));
    }
    
    public function add($codproducto){
        $producto=Producto::where('codproducto', $codproducto)->first();
        $carro = \Session::get('carro');
        $producto->cantidad=1;
        $carro[$producto->codproducto] = $producto;
        \Session::put('carro',$carro);

        return redirect()->route('carro-show');
    }

    public function delete($codproducto){
        $producto=Producto::where('codproducto', $codproducto)->first();
        $carro = \Session::get('carro');
        unset($carro[$producto->codproducto]);
        \Session::put('carro',$carro);

        return redirect()->route('carro-show');
    }
    public function trash(){
        \Session::forget('carro');
        
        return redirect()->route('carro-show');
    }
    public function update($codproducto, $cantidad ){
        $producto=Producto::where('codproducto', $codproducto)->first();
        $carro = \Session::get('carro');
        $carro[$producto->codproducto]->cantidad=$cantidad;
        \Session::put('carro',$carro);

        return redirect()->route('carro-show');
    }
    public function total(){
        $carro = \Session::get('carro');
        $total = 0;
        foreach($carro as $item){
            $total += $item->precio * $item->cantidad;
        }
        return $total;
    }
    const PAGINATION=10;
    public function listarProducto(){
        $producto = Producto::all();
        return  view('tablas/carro.index',compact('producto'));
    }
}
