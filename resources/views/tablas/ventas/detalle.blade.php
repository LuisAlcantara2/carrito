@extends('layout.plantilla')
@section('contenido')

<h1>DETALLE DE LA COMPRA</h1>
@if(session('datos'))
<div class="alert alert-warning alert-dismissile fade show mt-3" role="alert">
    {{session ('datos') }}
    <button class="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venta as $itemventa)
                <tr>
                <th>{{$itemventa->nombre}}</th>
                <td>{{$itemventa->precio}}</td>
                <td>{{$itemventa->cantidad}}</td>
                <td>{{number_format($itemventa->precio* $itemventa->cantidad,2)}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
    {{$venta->links()}}  

@endsection