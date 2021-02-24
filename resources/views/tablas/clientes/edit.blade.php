<h1>Editar Registro</h1>   
<form method="POST" action="{{ route('cliente.update',$cliente->codcliente)}}">
@method('put')
        @csrf
  <div class="form-group">
  <div class="row">
  <div class="col-3">
    <label for="descripcion">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre}}">
  </div>
  <div class="col-3">
    <label for="descripcion">Direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion}}">
  </div>
  <div class="col-3">
    <label for="descripcion">RUC o DNI</label>
    <input type="text" class="form-control" id="rucdni" name="rucdni" value="{{ $cliente->rucdni}}">
  </div>
  <div class="col-3">
    <label for="descripcion">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{ $cliente->email}}">
  </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 