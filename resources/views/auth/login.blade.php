@extends('layout.carro')
@section('estilo')
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('contenido')
    <div class="logo">
    <!-- <img src="{{asset('/img/visa.png')}}" alt="Sistema de Ventas & ABC">
        <p>Sistema de Ventas & ABC</p> -->
    </div>
    <div class="content">                         
    
    <form method="POST" action="{{route('carro.login')}}">                         
            @csrf  
            <h4 class="form-title">Inicio de Sesión</h4>
            <div class="form-group">
                    <label class="control-label">USUARIO:</label>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input class="form-control @error('name') is-invalid @enderror"  type="text"  placeholder="Ingrese usuario" id="name" name="name" value="{{old('name')}}"/>                        
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    </div>
            </div>
            <div class="form-group">
                <label class="control-label">CONTRASEÑA:</label>
                <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Ingrese contraseña"  id="password" name="password"  value="{{old('password')}}"/>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>                

            <hr />
            <div class="form-actions">
                <button class="btn btn-success btn-block">Ingresar </button>
            </div>
            <br>

            <div class="form-actions">
                No tienes cuenta, registrate <a href="{{route('carro-registrar')}}">aquí</a>
            </div>
            <hr />
        </form>            
    </div>
    <div class="copyright">
            <!--  2020 &copy; Sistema de Ventas & ABC. -->
    </div>
@endsection
@section('script')
        <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/dist/js/adminlte.min.js"></script>        
@endsection