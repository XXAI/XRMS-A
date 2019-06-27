<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Red Salud: Registro</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('modulos/registro/registro.js')}}"></script>
    </head>
    <body>
        <div>
            <!--div class="jumbotron jumbotron-fluid text-center">
                <div class="container">
                    <h1 class="display-5">Instalación y Toma de Protesta de la Red Chiapaneca de Municipios por la Salud</h1>
                </div>
            </div-->
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
                <h2 class="display-5 text-center">Instalación y Toma de Protesta de la Red Chiapaneca de Municipios por la Salud</h2>
                <div id="formulario-completo" class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">Formulario de Registro</h5>
                    </div>
                    <div class="card-body text-center text-success bg-white guardado-correcto" style="display:none;">
                        <h5 class="card-title">Registro Guardado Exitosamente</h5>
                        <p class="card-text">Haga click en el boton para capturar otro registro.</p>
                        <a href="#" class="btn btn-primary" onclick="capturarNuevoRegistro()">Nuevo Registro</a>
                    </div>
                    <div class="card-body captura-formulario">
                        <form id="formulario_registro"> <!-- action="{{url('api/registro_participantes')}}" method="post" -->
                            <div class="form-group"> 
                                <label>Tipo:</label> 
                                <select name="tipo_asistente" id="tipo_asistente" class="form-control" onchange="cambiarTipo()">
                                    <option value='ayuntamiento' selected="selected">Ayuntamiento</option>
                                    <option value='personal'>Personal de salud</option>
                                </select>
                                <div id="error_tipo_asistente" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
                                <div id="error_nombre" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group form_ayuntamiento"> 
                                <label>Puesto:</label> 
                                <select name="puesto_id" id="puesto_id" class="form-control" onchange="cambiarPuesto()">
                                    <option value='' selected="selected">Seleccione un puesto</option>
                                    @foreach($datos['puestos'] as $puesto)
                                    <option value='{{$puesto->id}}'>{{$puesto->descripcion}}</option>
                                    @endforeach
                                </select>
                                <div id="error_puesto_id" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group" id="div_otro_puesto" style="display:none;">
                                <label><span class="form_ayuntamiento">Otro</span> Puesto</label>
                                <input type="text" class="form-control" name="otro_puesto" id="otro_puesto">
                                <div id="error_otro_puesto" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label>Telefono de oficina</label>
                                <input type="text" class="form-control" name="telefono_oficina" id="telefono_oficina">
                                <div id="error_telefono_oficina" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label>Telefono Celular</label>
                                <input type="text" class="form-control" name="telefono_celular" id="telefono_celular">
                                <div id="error_telefono_celular" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                                <div id="error_email" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label>Region</label>
                                <select name="region_id" id="region_id" class="form-control"  onchange="cargarMunicipios()">
                                    <option value='' selected="selected">Seleccione una region</option>
                                    @foreach($datos['regiones'] as $region)
                                    <option value='{{$region->id}}'>{{$region->nombre}}</option>
                                    @endforeach
                                </select>
                                <div id="error_region_id" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group form_ayuntamiento">
                                <label>Municipio</label>
                                <select name="municipio_id" id="municipio_id" class="form-control" >
                                    <option value='' selected="selected">Seleccione un municipio</option>
                                </select>
                                <div id="error_municipio_id" class="invalid-feedback"></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer captura-formulario">
                        <div class="form-row">
                            <div class="col-md-6 col-hidden"></div>
                            <div class="col-md-4 col-6">
                                <button class="btn btn-default btn-block" type="button" onclick="limpiarFormulario()">Limpiar Formulario</button>
                            </div>
                            <div class="col-md-2 col-6">
                                <button class="btn btn-primary btn-block" type="button" onclick="enviarFormulario()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </body>
</html>