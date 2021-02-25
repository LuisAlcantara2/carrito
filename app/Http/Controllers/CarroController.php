<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Cliente;
use App\Venta;
use App\Detalleventa;
use DB;
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
    public function listarProducto(Request $request){
        $categoria=Categoria::all(); 
        $buscarpor=$request->codcategoria;
        if($buscarpor=="" || $buscarpor=="0"){
            $producto=Producto::all();
        }else{
            $producto = Producto::where('codcategoria','=',$buscarpor)->get();
        }
        return  view('tablas/carro.index',compact('producto','categoria','buscarpor'));
    }
    public function login(Request $request){
        $data=request()->validate([
            'name'=>'required',
            'password'=>'required',
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña',
        ]);
        $name=$request->get('name');
        $query=Cliente::where('email','=',$name)->get();
        if($query->count()!=0){
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if($password==$hashp){
                $cliente=DB::table('cliente')->where('email','=',$name)->first();
                $carro = \Session::get('carro');
                $total = $this->total();
                return view('tablas/carro.validar',compact('cliente','carro','total'));
            }else{
                return back()->withErrors(['password'=>'Contraseña no valida'])->withInput([request('password')]);
            }
        }
        else
        {
            return back()->withError(['name'=>'Usuario no valido'])->withInput([request('name')]);
         }
    }
    public function createCliente()
    {
        return view('auth/registro');
    }
    public function storeCliente(Request $request)
    {
        $cliente=new Cliente();
        $cliente->nombre=$request->nombre;
        $cliente->direccion=$request->direccion;
        $cliente->rucdni=$request->rucdni;
        $cliente->email=$request->email;
        $cliente->password=$request->password;
        $cliente->save();
        $carro = \Session::get('carro');
        $total = $this->total();
        return redirect()->route('carro-validar',compact('cliente','carro','total'))->with('datos','Registro Nuevo Guardado!!');
        
    }
    public function validar(Request $request)
    {
        if(count(\Session::get('carro'))<=0) return redirect()->route('home');
        $carro = \Session::get('carro');
        $total = $this->total();
        dd($total);
        //return view('tablas/carro/validar', compact('carro','total'));
    }
    public function guardar($cod)
    {
        $this->guardarVenta($cod);
        \Session::forget('carro');
        return \Redirect::route('carro-show')->with('message','Compra realizada de forma correcta');
    }
    protected function guardarVenta($codcliente){
        $subtotal = 0;
        $carro = \Session::get('carro');

        foreach($carro as $item){
            $subtotal += $item->cantidad * $item->precio;
        }
        $venta = Venta::create([
            
            'subtotal' => $subtotal/1.18,
            'igv' => $subtotal*0.18,
            'total' => $subtotal,
            'estado' => 1,
            'codcliente' => $codcliente
        ]);
        foreach($carro as $item){
            $this->guardarVentaDetalle($item,$venta->codventa);
        }
    }
    protected function guardarVentaDetalle($producto, $codventa){
        $detalle = Detalleventa::create([
            'precio'=> $producto->precio,
            'cantidad' => $producto->cantidad,
            'codventa' => $codventa,
            'codproducto' => $producto->codproducto
        ]);
    }
}
