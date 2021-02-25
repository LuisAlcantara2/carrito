@extends('layout.carro')
@section('contenido')
<div class="products">
    <h1>LISTADO DE PRODUCTOS</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producto as $itemproducto)
            <tr>
            <td><img src="{{$itemproducto->imagen}}" alt="" height="90" width="90"></td>
            <td>{{$itemproducto->nombre}}</td>
            <td>{{$itemproducto->categoria->descripcion}}</td>
            <td>{{$itemproducto->stock}}</td>
            <td>{{$itemproducto->precio}}</td>
            <td>
                <a href="{{route('producto.show', $itemproducto->codproducto)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Detalle</a>
                <a href="{{route('carro-add', $itemproducto->codproducto)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Agregar al carrito</a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>


</div>
@stop