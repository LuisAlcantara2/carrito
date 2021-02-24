
<h3>LISTADO DE CLIENTES</h3>
<a href="{{route('cliente.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
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
                <th scope="col">Codigo Cliente</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">DNI o RUC</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cliente as $itemcliente)
                <tr>
                <th>{{$itemcliente->codcliente}}</th>
                <td>{{$itemcliente->nombre}}</td>
                <td>{{$itemcliente->direccion}}</td>
                <td>{{$itemcliente->rucdni}}</td>
                <td>{{$itemcliente->email}}</td>
                <td>
                    <a href="{{route('cliente.edit',$itemcliente->codcliente)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{route('cliente.confirmar',$itemcliente->codcliente)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
    {{$cliente->links()}}            