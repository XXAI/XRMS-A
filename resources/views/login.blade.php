<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Red Salud: Login</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset('images/LOGOS-01.jpg')}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('images/LOGOS-03.jpg')}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('images/Promocion de la Salud Horizontall.jpg')}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('images/LOGO-01.jpg')}}" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="offset-4 col-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5 class="card-title">Iniciar Sesión</h5>
                            </div>
                            <div class="card-body">
                                <form id="formulario_login"> <!-- action="{{url('api/registro_participantes')}}" method="post" -->
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="text" class="form-control" name="user" id="user">
                                        <div id="error_user" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                        <div id="error_password" class="invalid-feedback"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer captura-formulario">
                                <button class="btn btn-primary btn-block" type="button" onclick="enviarFormulario()">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </body>
</html>