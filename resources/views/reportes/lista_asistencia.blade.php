<table>
    <tr><td colspan="12"></td></tr>
    <tr><th colspan="12" style="font-weight:bold; text-align:center;">GOBIERNO DEL ESTADO DE CHIAPAS</th></tr>
    <tr><th colspan="12" style="font-weight:bold; text-align:center;">SECRETARÍA DE SALUD E INSTITUTO DE SALUD DEL ESTADO DE CHIAPAS</th></tr>
    <tr><th colspan="12" style="font-weight:bold; text-align:center;"><small>LISTA DE ASISTENCIA</small></th></tr>

    <tr>
        <td colspan="3" style="font-weight:bold;">MOTIVO DE LA REUNIÓN:</td>
        <td colspan="8" style="font-weight:bold; text-align:center;">INSTALACIÓN Y TOMA DE PROTESTA DE LA RED CHIAPANECA DE MUNICIPIOS POR LA SALUD</td>
        <td></td>
    </tr>

    <tr>
        <td colspan="2"  style="font-weight:bold;">CONVOCA:</td>
        <td colspan="2" style="font-weight:bold; text-align:center;">ÁREA DE PROMOCIÓN DE LA SALUD</td>
        <td></td>
        <td style="font-weight:bold;">LUGAR:</td>
        <td colspan="2" style="font-weight:bold; text-align:center;">COMITÁN DE DOMÍNGUEZ, CHIAPAS</td>
        <td></td>
        <td style="font-weight:bold;">FECHA:</td>
        <td colspan="2" style="font-weight:bold; text-align:center;">29 DE JUNIO DE 2019</td>
    </tr>
    <tr>
        <td>JURISDICCIÓN SANITARIA I - TUXTLA GUTIERREZ</td>
    </tr>

    <tr>
        <td colspan="10"></td>
    </tr>

    <tr>
        <th>No.</th>
        <th colspan="3">NOMBRE</th>
        <th colspan="3">CARGO</th>
        <th>CELULAR</th>
        <th colspan="3">CORREO ELECTRONICO</th>
        <th>FIRMA</th>
    </tr>
    @foreach($registros as $index => $registro)
    <tr>
        <td>{{$index+1}}</td>
        <td colspan="3">{{{$registro->nombre}}}</td>
        <td colspan="3">{{ ($registro->tipo_asistente == 'ayuntamiento')?( ($registro->puesto_id == 999)?$registro->otro_puesto:$registro->puesto ):$registro->otro_puesto}}</td>
        <td>{{$registro->telefono_celular}}</td>
        <td colspan="3">{{$registro->email}}</td>
        <td></td>
    </tr>
    @endforeach
</table>