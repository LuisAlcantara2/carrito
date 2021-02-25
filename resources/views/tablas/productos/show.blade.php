@extends('layout.carro')
@section('contenido')
    <h1>Detalle del Producto</h1>

    <div class="product-block">
        
    </div>
    <div class="product-block">
        <h3>{{$producto->nombre}}</h3>
        <div class="product-info">
            <img src="{{$producto->imagen}}" alt="">
            <p>Precio: S/.{{number_format($producto->precio,2)}}</p>
            <p>
                <a href="{{route('carro-add', $producto->codproducto)}}">Lo quiero</a>
            </p>
        </div>
    </div>
    <p><a href="{{route('carro-listar')}}">Regresar</a></p>
@stop