<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <table>
            <tr height="8">
                <td width="5">  <!-- A --> </td>
                <td width="6">  <!-- B --> </td>
                <td width="12"> <!-- C --> </td>
                <td width="29"> <!-- D --> </td>
                <td width="5">  <!-- E --> </td>
                <td width="8">  <!-- F --> </td>
                <td width="58"> <!-- G --> </td>
                <td width="14"> <!-- H --> </td>
                <td width="3">  <!-- I --> </td>
                <td width="8">  <!-- J --> </td>
                <td width="32"> <!-- K --> </td>
                <td width="41"> <!-- L --> </td>
            </tr>
            <tr height="60"><td colspan="12"></td></tr>
            <tr><th colspan="12" style="font-weight:bold; text-align:center;">GOBIERNO DEL ESTADO DE CHIAPAS</th></tr>
            <tr><th colspan="12" style="font-weight:bold; text-align:center;">SECRETARÍA DE SALUD E INSTITUTO DE SALUD DEL ESTADO DE CHIAPAS</th></tr>
            <tr><th colspan="12" style="font-weight:bold; text-align:center;"><small>LISTA DE ASISTENCIA</small></th></tr>

            <tr><td colspan="11"></td><td>Folio:</td></tr>

            <tr>
                <td colspan="3" style="font-weight:bold;">MOTIVO DE LA REUNIÓN:</td>
                <td colspan="5" style="font-weight:bold; text-align:center;">INSTALACIÓN Y TOMA DE PROTESTA DE LA RED CHIAPANECA DE MUNICIPIOS POR LA SALUD</td>
                <td colspan="4"></td>
            </tr>

            <tr height="6"><td colspan="12"></td></tr>

            <tr>
                <td colspan="2" style="font-weight:bold;">CONVOCA:</td>
                <td colspan="2" style="font-weight:bold; text-align:center;">ÁREA DE PROMOCIÓN DE LA SALUD</td>
                <td></td>
                <td style="font-weight:bold;">LUGAR:</td>
                <td style="font-weight:bold; text-align:center;">COMITÁN DE DOMÍNGUEZ, CHIAPAS</td>
                <td colspan="2"></td>
                <td style="font-weight:bold;">FECHA:</td>
                <td style="font-weight:bold; text-align:center;">29 DE JUNIO DE 2019</td>
                <td></td>
            </tr>

            <tr height="6"><td colspan="12"></td></tr>

            <tr>
                <td colspan="12" style="font-weight:bold; text-align:center;">JURISDICCIÓN SANITARIA I - TUXTLA GUTIERREZ</td>
            </tr>

            <tr height="6"><td colspan="12"></td></tr>

            <tr>
                <th style="font-weight:bold; text-align:center; background-color:#DDDDDD;">No.</th>
                <th style="font-weight:bold; text-align:center; background-color:#DDDDDD;" colspan="3">NOMBRE</th>
                <th style="font-weight:bold; text-align:center; background-color:#DDDDDD;" colspan="3">CARGO</th>
                <th style="font-weight:bold; text-align:center; background-color:#DDDDDD;">CELULAR</th>
                <th style="font-weight:bold; text-align:center; background-color:#DDDDDD;" colspan="3">CORREO ELECTRONICO</th>
                <th style="font-weight:bold; text-align:center; background-color:#DDDDDD;">FIRMA</th>
            </tr>
            @foreach($registros as $index => $registro)
            <tr height="20">
                <td>{{$index+1}}</td>
                <td colspan="3">{{{$registro->nombre}}}</td>
                <td colspan="3">{{ ($registro->tipo_asistente == 'ayuntamiento')?( ($registro->puesto_id == 999)?$registro->otro_puesto:$registro->puesto ):$registro->otro_puesto}}</td>
                <td>{{$registro->telefono_celular}}</td>
                <td colspan="3">{{$registro->email}}</td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </body>
</html>