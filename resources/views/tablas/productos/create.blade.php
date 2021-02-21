<div class="container">
    <h1>Crear Registro</h1>    
    <hr>
    <form method="POST" action="{{ route('producto.store')}}">
        @csrf
        <div class="form-row">                
            <div class="form-group col-md-6">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" maxlength="30" id="descripcion" name="descripcion" autocomplete="off">              
                @error('descripcion')    
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
                        <option value="{{$itemcategoria->codcategoria}}">{{$itemcategoria->descripcion}}</option>                
                    @endforeach            
                </select>
            </div>
        </div>
        <div class="form-row">                
            <div class="form-group col-md-4">
                <label for="precio">Precio</label>
                <input  class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio"  style="text-align:right" value="0" autocomplete="off" type="number"/>                        
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
                
                <input  class="form-control @error('stock') is-invalid @enderror" data-smk-type="decimal"  id="stock" name="stock" style="text-align:right" value="0" autocomplete="off" type="number">
                
                @error('stock')    
                    <span class="invalid-feedback" role="alert"> 
                    <strong>{{ $message }}</strong>
                </span>   
            @enderror     
            </div>              
        </div>     
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{ route('cancelar1') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
