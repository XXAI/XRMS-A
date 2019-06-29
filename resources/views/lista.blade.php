<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Red Salud: Lista de Asistencia</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('modulos/lista/lista.js')}}"></script>
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
                
                <div class="card">
                    <div class="card-header text-center">
                    <a class="btn btn-success float-left" href="api/excel-asistencia" download="downloadFile.xlsx"><i class="fas fa-download"></i></a>
                        <h5 class="card-title">Lista de Asistencia</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form id="formulario_filtro" onkeydown="return event.key != 'Enter';">
                            <div class="form-row">
                                <div class="col-6 col-md">
                                    <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Buscar" onkeydown="buscarPalabra(event)">
                                </div>
                                <div class="col-6 col-md">
                                    <select name="tipo_asistente" id="tipo_asistente" class="form-control">
                                        <option value='' selected="selected">Filtrar por tipo</option>
                                        <option value='ayuntamiento'>Ayuntamiento</option>
                                        <option value='personal'>Personal de salud</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md">
                                    <select name="puesto_id" id="puesto_id" class="form-control">
                                        <option value='' selected="selected">Filtrar por puesto</option>
                                        @foreach($datos['puestos'] as $puesto)
                                        <option value='{{$puesto->id}}'>{{$puesto->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md">
                                    <select name="region_id" id="region_id" class="form-control">
                                        <option value='' selected="selected">Filtrar por region</option>
                                        @foreach($datos['regiones'] as $region)
                                        <option value='{{$region->id}}'>{{$region->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-2 col-bg-1">
                                    <button type="button" class="btn btn-primary btn-block" onclick="aplicarFiltro()">Aplicar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Región</th>
                                <th width="1">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="lista_registros">
                            <tr>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2">
                                Total: <span id="total_asistentes">0</span>
                            </div> 
                            <div class="offset-md-6 col-md-4">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-info boton_primero_anterior" onclick="cargarPagina('primera')"><i class="fas fa-angle-double-left"></i></button>
                                    <button type="button" class="btn btn-info boton_primero_anterior" onclick="cargarPagina('anterior')"><i class="fas fa-angle-left"></i></button>
                                    <input type="text" class="form-control text-center" placeholder="Página" value="1" id="pagina_actual" onkeydown="if(event.key == 'Enter'){cargarPagina();}">
                                    <input type="hidden" value="1" id="total_paginas">
                                    <button type="button" class="btn btn-info boton_ultimo_siguiente" onclick="cargarPagina('siguiente')"><i class="fas fa-angle-right"></i></button>
                                    <button type="button" class="btn btn-info boton_ultimo_siguiente"  onclick="cargarPagina('ultima')"><i class="fas fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </body>
</html>