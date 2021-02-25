@extends('layout.carro')
@section('contenido')
    <h1>Detalle del Producto</h1>

    <div class="product-block">
        
    </div>
    <div class="row">
        <div class="col-6">
            <img src="{{$producto->imagen}}" alt="" width="100%">
        </div>
        <div class="col-6 product-info">
            <h3>{{$producto->nombre}}</h3>
            <p>{{$producto->descripcion}}</p>
            <p>Precio: S/.{{number_format($producto->precio,2)}}</p>
            <p>
                <a href="{{route('carro-add', $producto->codproducto)}}" class="btn btn-primary">Lo quiero</a> <a class="btn btn-danger" href="{{route('carro-listar')}}">Regresar</a></p>
        </div>
    </div>
    
@stop