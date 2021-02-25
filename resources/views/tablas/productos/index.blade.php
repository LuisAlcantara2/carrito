@extends('layout.plantilla')
@section('contenido')

<h1>LISTADO DE PRODUCTOS</h1>

<a href="{{route('producto.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
<nav class="navbar float-right">
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar por descrpcion" aria-label="Search" id="buscarpor" name="buscarpor" value={{$buscarpor}} >
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
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
                <th scope="col">Codigo</th>
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
                <td><img src="{{$itemproducto->imagen}}" alt="" height="100" width="90"></td>
                <td>{{$itemproducto->nombre}}</td>
                <td>{{$itemproducto->categoria->descripcion}}</td>
                <td>{{$itemproducto->stock}}</td>
                <td>{{$itemproducto->precio}}</td>
                <td>
                    <a href="{{route('producto.edit',$itemproducto->codproducto)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{route('producto.confirmar',$itemproducto->codproducto)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
    {{$producto->links()}}
            
@endsection