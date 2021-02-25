@extends('layout.carro')
@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('storeCliente')}}">
    @csrf
  <div class="form-group">
  <div class="row">
  <div class="col-3">
    <label for="descripcion">Nombre</label>
    <input type="text" class="form-control  @error('nombre') is-invalid @enderror"  id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese Nombre">
    @error('nombre')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-3">
    <label for="descripcion">Direccion</label>
    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{old('direccion')}}" placeholder="Ingrese Direccion">
    @error('direccion')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-3">
    <label for="descripcion"> DNI</label>
    <input type="text" class="form-control @error('rucdni') is-invalid @enderror" id="rucdni" name="rucdni" value="{{old('rucdni')}}" placeholder="Ingrese DNI">
    @error('rucdni')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-3">
    <label for="descripcion">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="Ingrese Email">
    @error('email')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-3">
    <label for="password">Password</label>
    <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"  value="{{old('password')}}" type="password" placeholder="Ingrese Password">
    @error('password')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('regresar1')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
@endsection