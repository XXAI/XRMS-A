<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Red Salud: Lista de Asistencia</title>
        <!-- Fonts -->
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
                        <h5 class="card-title">Lista de Asistencia</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form id="formulario_filtro">
                            <div class="form-row">
                                <div class="col-6 col-md">
                                    <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Buscar">
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
                    <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end" id="paginador">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#primero" tabindex="-1" aria-disabled="true" onclick="cambiarPagina(event,'Primero')">Primero</a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#anterior" tabindex="-1" aria-disabled="true" onclick="cambiarPagina(event,'anterior')"><span aria-hidden="true">&laquo;</span></a>
                                </li>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">
                                        1
                                        <span class="sr-only">(current)</span>
                                    </span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#4"  onclick="cambiarPagina(event,'2')">2</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#siguiente" onclick="cambiarPagina(event,'siguiente')"><span aria-hidden="true">&raquo;</span></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#ultimo" onclick="cambiarPagina(event,'ultimo')">Ultimo</a>
                                </li>
                            </ul>
                        </nav>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <br>
        </div>
    </body>
</html>