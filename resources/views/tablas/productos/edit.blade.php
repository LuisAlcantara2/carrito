@extends('layout.plantilla')
@section('contenido')

<div class="container">
        <h1>Editar Registro</h1>    
    <form method="POST" action="{{ route('producto.update',$producto->codproducto)}}">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id">Codigo</label>
                <input type="text" class="form-control" id="codproducto" name="codproducto" placeholder="Codigo" value="{{ $producto->codproducto}}" disabled>                
                </div>
                <div class="form-group col-md-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" autocomplete="off" class="form-control @error('nombre') is-invalid @enderror" maxlength="30" id="nombre" name="nombre" value="{{ $producto->nombre }}">
                    @error('nombre')    
                        <span class="invalid-feedback" role="alert"> 
                        <strong>{{ $message }}</strong>
                        </span>   
                    @enderror     
                </div>              
            </div>              
            <div class="form-row">                
                <div class="form-group col-md-6">
                    <label for="">Categorias</label>                
                        <select class="form-control"  id="codcategoria" name="codcategoria">
                            @foreach($categoria as $itemcategoria)
                            <option value="{{$itemcategoria->codcategoria}}" {{ $itemcategoria->codcategoria==$producto->codcategoria ? 'selected':'' }}>{{$itemcategoria->descripcion}}</option>                            
                        @endforeach            
                    </select>
                </div>
            </div>            
            <div class="form-row">                
                <div class="form-group col-md-4">
                    <label for="precio">Precio</label>
                <input type="text" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio"   style="text-align:right" value="{{$producto->precio}}" autocomplete="off"/>                        
                    @error('precio')    
                        <span class="invalid-feedback" role="alert"> 
                        <strong>{{ $message }}</strong>
                        </span>   
                    @enderror     
                </div>              
            </div>     
            <div class="form-row">                
                <div class="form-group col-md-4">
                    <label for="stock">Stock</label>
                    
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" data-smk-type="decimal"  id="stock" name="stock" style="text-align:right" value="{{$producto->stock}}" autocomplete="off">
                    
                    @error('stock')    
                        <span class="invalid-feedback" role="alert"> 
                        <strong>{{ $message }}</strong>
                    </span>   
                @enderror     
                </div>              
            </div>
            <div class="form-row">                
            <div class="form-group col-md-4">
                <label for="imagen">Ingrese link de imagen</label>
                
                <input  class="form-control" id="imagen" name="imagen" style="text-align:right" value="{{$producto->imagen}}">
            </div>              
        </div>     
        <div class="form-row">                
            <div class="form-group col-md-4">
                <label for="descripcion">Descripcion</label>
                <input  class="form-control" id="descripcion" name="descripcion" value="{{$producto->descripcion}}">
                    
            </div>              
        </div>       
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{ route('cancelar1') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection