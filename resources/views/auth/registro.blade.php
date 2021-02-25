@extends('layout.carro')
@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('storeCliente')}}">
    @csrf
  <div class="form-group">
  <div class="row">
  <div class="col-3">
    <label for="descripcion">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre">
  </div>
  <div class="col-3">
    <label for="descripcion">Direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese Direccion">
  </div>
  <div class="col-3">
    <label for="descripcion">RUC o DNI</label>
    <input type="text" class="form-control" id="rucdni" name="rucdni" placeholder="Ingrese RUC o DNI">
  </div>
  <div class="col-3">
    <label for="descripcion">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese Email">
  </div>
  <div class="col-3">
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" name="password" placeholder="Ingrese Password">
  </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar2')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
@endsection