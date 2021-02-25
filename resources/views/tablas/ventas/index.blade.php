@extends('layout.plantilla')
@section('contenido')

<h1>LISTADO DE PRODUCTOS</h1>
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
                <th scope="col">Numero</th>
                <th scope="col">Fecha compra</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Total</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venta as $itemventa)
                <tr>
                <th>{{$itemventa->numero}}</th>
                <td>{{$itemventa->fecha}}</td>
                <td>{{$itemventa->nombre}}</td>
                <td>{{$itemventa->total}}</td>
                <td>
                    <a href="{{route('venta.detalle',$itemventa->codventa)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Detalles</a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
    {{$venta->links()}}  

@endsection