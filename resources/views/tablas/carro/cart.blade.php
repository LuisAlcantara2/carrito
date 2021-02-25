@extends('layout.carro')
@section('contenido')
<div class="container text center" >
    <div class="page-header">
        <h1>Carrito de compras</h1>
    </div>
    <div class="table-carro">
        @if(count($carro))
        <p>
            <a href="{{route('carro-trash')}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  Vaciar Carrito</a>
        </p>
        <div class="table-responsive">
            <table class="table table-striped table-hover-table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carro as $item)
                        <tr>
                            <td> <img src="{{$item->imagen}}" alt="" height="90" width="90"> </td>
                            <td>{{$item->nombre}}</td>
                            <td>{{number_format($item->precio,2)}}</td>
                            <td>
                                <input 
                                    type="number" 
                                    min="1" 
                                    max="{{$item->stock}}" 
                                    value="{{$item->cantidad}}" 
                                    id="producto_{{$item->codproducto}}"
                                    class="actualizar"
                                >
                                <a 
                                    href="#" 
                                    class="btn btn-warning btn-update-item" 
                                    data-href="{{route('carro-update', $item->codproducto)}}" 
                                    data-id="{{$item->codproducto}}">
                                    <i class="fas fa-redo"></i> 
                                </a>
                            </td>
                            <td>{{number_format($item->precio* $item->cantidad,2)}}</td>
                            <td>
                                <a href="{{route('carro-delete',$item->codproducto)}}" class="btn btn-danger">
                                    <i class="fas fa-ban"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h3> <span class="label label-success">
                Total: {{number_format($total,2)}}</span></h3>
        </div>
        @else
        <h3><span class="label label-warning"> No hay productos en el carrito</span></h3>
        @endif
        <hr>
        <p>
            <a href="{{route('carro-listar')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Seguir comprando</a>
            <a href="{{route('carro-login')}}" class="btn btn-primary"> Continuar <i class="fas fa-forward"></i></a>
        </p>
        
    </div>
</div>
@stop
@section('script')
<script src="/js/main.js"></script>     
@endsection
