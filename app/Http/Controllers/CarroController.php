<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Cliente;
use Carbon\Carbon;
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
    const PAGINATION=4;
    public function listarProducto(Request $request){
        $categoria=Categoria::all(); 
        $buscarpor=$request->codcategoria;
        if($buscarpor=="" || $buscarpor=="0"){
            $producto=Producto::where('stock','<>',0)->get();
        }else{
            $producto = Producto::where('codcategoria','=',$buscarpor)
            ->where('stock','<>',0)->get();
        }
        return  view('tablas/carro.index',compact('producto','categoria','buscarpor'));
    }
    public function verlogin(){
        if(count(\Session::get('carro'))<=0) return redirect()->route('carro-listar')->with('datos','NO HA SELECCIONADO NINGUN PRODUCTO');
        return view('auth/login');
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
            return back()->withErrors(['name'=>'Usuario no valido'])->withInput([request('name')]);
        }
    }
    public function createCliente()
    {
        return view('auth/registro');
    }
    public function storeCliente(Request $request)
    {
        $data=request()->validate([
            'nombre'=>'required|max:100',
            'direccion'=>'required|max:80',
            'rucdni'=>'required|digits:8',
            'email'=>'required|email|unique:cliente,email',
            'password'=>'required|max:255',
        ],
        [
            'nombre.required'=>'Ingrese su nombre',
            'nombre.max'=>'Maximo 100 caracteres para su nombre',
            'direccion.required'=>'Ingrese su direccion',
            'direccion.max'=>'Maximo 80 caracteres para direccion',
            'rucdni.required'=>'Ingrese su DNI',
            'rucdni.digits'=>'DNI debe tener 8 digitos',
            'email.required'=>'Ingrese su correo',
            'email.email'=>'Ingrese un correo valido',
            'email.unique'=>'Ya ha sido registrado',
            //'telefono.numeric'=>'Ingrese solo digitos',
            'password.required'=>'Ingrese su correo',
            'password'=>'Maximo de caracteres para password',
            //'nroseguro.numeric'=>'Ingrese solo digitos',
        ]);
        $cliente=new Cliente();
        $cliente->nombre=$request->nombre;
        $cliente->direccion=$request->direccion;
        $cliente->rucdni=$request->rucdni;
        $cliente->email=$request->email;
        $cliente->password=$request->password;
        $cliente->save();
        
        $carro = \Session::get('carro');
        $total = $this->total();
        return view('tablas/carro/validar',compact('cliente','carro','total'));
        
    }
    public function validar(Request $request)
    {
        if(count(\Session::get('carro'))<=0) return redirect()->route('carro-listar')->with('message','COMPRA ALGO MRD');
        $carro = \Session::get('carro');
        $total = $this->total();
        return view('tablas/carro/validar', compact('carro','total'));
    }
    public function guardar($cod)
    {
        $this->guardarVenta($cod);
        \Session::forget('carro');
        return \Redirect::route('carro-listar')->with('datos','Compra realizada de forma correcta');
    }
    protected function guardarVenta($codcliente){
        $subtotal = 0;
        $carro = \Session::get('carro');

        foreach($carro as $item){
            $subtotal += $item->cantidad * $item->precio;
        }
        $tempfecha=Carbon::now();
        $cuenta=\DB::table('venta')->count()+1;
        $venta = Venta::create([
            'numero_ticket' => $cuenta,
            'fecha' => $tempfecha,
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
        $prod=Producto::findOrFail($producto->codproducto);
        $prod->stock=$prod->stock-$producto->cantidad;
        $prod->save(); 
    }
}
