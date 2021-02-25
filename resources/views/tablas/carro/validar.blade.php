@extends('layout.carro')
@section('contenido')
<h1>DATOS PERSONALES</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Direccion</th>
        <th scope="col">Correo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{$cliente->nombre}}</td>
        <td>{{$cliente->direccion}}</td>
        <td>{{$cliente->email}}</td>
        </tr>
    </tbody>
    </table>
<h1>DETALLE DE PEDIDO</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Imagen</th>
        <th scope="col">Producto</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Subtototal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carro as $item)
        <tr>
        <td><img src="{{$itemproducto->imagen}}" alt="" height="100" width="90"></td>
        <td>{{$item->nombre}}</td>
        <td>{{number_format($item->precio,2)}}</td>
        <td>{{$item->cantidad}}</td>
        <td>{{number_format($item->precio* $item->cantidad,2)}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <h3>
        <span class="label label-success">
            Total : S/. {{$total}}
        </span>
    </h3><hr>
    <p>
        <a href="{{route('carro-show')}}" class="btn btn-primary">
            <i class="fa fa-chevron-circle-left"></i> Regresar</a>
        <a href="{{route('guardar', $cliente->codcliente)}}" class="btn btn-warning">
            <i class=""></i> Continuar</a>
    </p>
@endsection