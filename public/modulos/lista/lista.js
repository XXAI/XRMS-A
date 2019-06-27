function aplicarFiltro(){
    var parametros = $("#formulario_filtro").serialize();
    parametros += '&page=1';
    $.get('api/registro', parametros, function(data){
        var registros = "";
        for(var i in data['paginado'].data){
            var elemento = data['paginado'].data[i];
            registros += "<tr><td>"+elemento.id+"</td><td>"+elemento.nombre+"</td><td>"+elemento.puesto_id+"</td><td>"+elemento.region_id+"</td></tr>";
        }
        $('#lista_registros').html(registros);
    });
}

function cambiarPagina(eventm,pagina){
    event.preventDefault();
    console.log(pagina);
}

window.onload = function () { aplicarFiltro(); }
