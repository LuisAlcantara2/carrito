
<h1>Crear Registro</h1>
<form method="POST" action="{{route('categoria.store')}}">
    @csrf
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" aria-describedby="emailHelp" placeholder="Ingrese descripcion">
    @error('descripcion')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
