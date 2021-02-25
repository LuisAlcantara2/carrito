@extends('layout.carro')
@section('contenido')
<div class="products">
    <h1>LISTADO DE PRODUCTOS</h1>
    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0">
            <select class="custom-select" id="codcategoria" name="codcategoria">
                <option value="0" selected>Seleccione una categoria</option>
                @foreach($categoria as $itemcategoria)
                <option {{$itemcategoria->codcategoria == $buscarpor? 'selected' : ''}}
                 value="{{$itemcategoria->codcategoria}}">{{$itemcategoria->descripcion}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar</button>
        </form>
    </nav>
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
                <a href="{{route('carro-add', $itemproducto->codproducto)}}" class="btn btn-success btn-sm"><i class="fas fa-cart-plus"></i> Agregar al carrito</a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>


</div>
@endsection