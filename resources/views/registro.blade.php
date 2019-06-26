<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('modulos/registro/registro.js')}}"></script>
    </head>
    <body>
        <div>
            <div class="jumbotron jumbotron-fluid">
                <div class="container text-center">
                    <h1 class="display-5">Instalación y Toma de Protesta de la Red Chiapaneca de Municipios por la Salud</h1>
                </div>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Formulario de Registro</h5>
                    </div>
                    <div class="card-body">
                        <form id="formulario_registro"> <!-- action="{{url('api/registro_participantes')}}" method="post" -->
                            <div class="form-group"> 
                                <label>Tipo:</label> 
                                <select name="tipo_asistente" id="tipo_asistente" class="form-control" onchange="cambiarTipo()">
                                    <option value='ayuntamiento' selected="selected">Ayuntamiento</option>
                                    <option value='personal'>Personal de salud</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="form-group form_ayuntamiento"> 
                                <label>Puesto:</label> 
                                <select name="puesto_id" id="puesto_id" class="form-control" onchange="cambiarPuesto()">
                                    <option value='' selected="selected">Seleccione un puesto</option>
                                    @foreach($datos['puestos'] as $puesto)
                                    <option value='{{$puesto->id}}'>{{$puesto->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="div_otro_puesto" style="display:none;">
                                <label><span class="form_ayuntamiento">Otro</span> Puesto</label>
                                <input type="text" class="form-control" name="otro_puesto">
                            </div>
                            <div class="form-group">
                                <label>Telefono de oficina</label>
                                <input type="text" class="form-control" name="telefono_oficina">
                            </div>
                            <div class="form-group">
                                <label>Telefono Celular</label>
                                <input type="text" class="form-control" name="telefono_celular">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group form_ayuntamiento">
                                <label>Region</label>
                                <select name="region_id" class="form-control" >
                                    <option value='' selected="selected">Seleccione una region</option>
                                    @foreach($datos['regiones'] as $region)
                                    <option value='{{$region->id}}'>{{$region->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form_ayuntamiento">
                                <label>Municipio</label>
                                <select name="municipio_id" class="form-control" >
                                    <option value='' selected="selected">Seleccione un municipio</option>
                                    @foreach($datos['municipios'] as $municipio)
                                    <option value='{{$municipio->id}}'>{{$municipio->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr/>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="form-row">
                            <div class="col-6"></div>
                            <div class="col-4">
                                <button class="btn btn-default btn-block" type="button">Limpiar Formulario</button>
                            </div>
                            <div class="col-2">
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