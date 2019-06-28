function aplicarFiltro(){
    $('#pagina_actual').val('1');
    actualizarRegistros();
}

function actualizarRegistros(){
    var parametros = $("#formulario_filtro").serialize();
    parametros += '&page='+$('#pagina_actual').val();

    $.get('api/registro', parametros, function(data){
        var registros = "";
        for(var i in data['paginado'].data){
            var elemento = data['paginado'].data[i];

            if(!elemento.region){
                elemento.region = '--';
            }

            if(!elemento.puesto_id || elemento.puesto_id == 999){
                elemento.puesto = 'Otro: ' + elemento.otro_puesto;
            }

            var icono = '<i class="fas fa-person-booth"></i>';
            if(elemento.tipo_asistente == 'ayuntamiento'){
                icono = '<i class="fas fa-user-tie"></i>';
            }

            if(elemento.asistencia){
                var botones_accion = '<span class="text-success"><i class="fas fa-check-circle"></i></span>';
            }else{
                var botones_accion = '<button class="btn btn-primary" alt="Confirmar Asistencia" onclick="confirmarAsistencia('+elemento.id+')"><i class="fas fa-clipboard"></i></button>';
            }

            if(elemento.email){
                elemento.email = '<br><small>'+elemento.email+'</small>';
            }else{
                elemento.email = '';
            }

            if(elemento.municipio){
                elemento.municipio = '<br><small>'+elemento.municipio+'</small>';
            }else{
                elemento.municipio = '';
            }
            
            registros += "<tr><td>"+icono+"</td><td>"+elemento.nombre+elemento.email+"</td><td>"+elemento.puesto+"</td><td>"+elemento.region+elemento.municipio+"</td><td id='acciones_para_"+elemento.id+"' class='text-center'>"+botones_accion+"</td></tr>";
        }
        $('#lista_registros').html(registros);

        $('#total_paginas').val(data['paginado'].last_page);
        $('#total_asistentes').text(data['paginado'].total);

        actualizarPaginador();
    });
}

function confirmarAsistencia(id){
    if(confirm("¿Desea confirmar la asistencia de esta persona?")){
        var parametros = {accion:'confirmar_asistencia'};
        $.put('api/registro/'+id,parametros, function(datos){
            console.log(datos);
            $('#acciones_para_'+datos.registro.id).html('<span class="text-success"><i class="fas fa-check-circle"></i></span>');
        });
    }
}

function buscarPalabra(event){
    if(event.key == 'Enter'){
        aplicarFiltro();
    }
}

function cambiarPagina(event,pagina){
    event.preventDefault();
    console.log(pagina);
}

function actualizarPaginador(){
    var pag_actual = $('#pagina_actual').val();
    var total_paginas = $('#total_paginas').val();

    if(pag_actual == 1){
        $('.boton_primero_anterior').attr('disabled',true);
        $('.boton_primero_anterior').addClass('disabled');
    }else{
        $('.boton_primero_anterior').attr('disabled',false);
        $('.boton_primero_anterior').removeClass('disabled');
    }

    if(pag_actual == total_paginas){
        $('.boton_ultimo_siguiente').attr('disabled',true);
        $('.boton_ultimo_siguiente').addClass('disabled');
    }else{
        $('.boton_ultimo_siguiente').attr('disabled',false);
        $('.boton_ultimo_siguiente').removeClass('disabled');
    }
}

function cargarPagina(pagina=''){
    var cargar_pagina = $('#pagina_actual').val();
    var total_paginas = $('#total_paginas').val();
    switch (pagina) {
        case 'siguiente':
            if(cargar_pagina < total_paginas){
                cargar_pagina++;
            }
            break;
        case 'anterior':
            if(cargar_pagina > 1){
                cargar_pagina--;
            }
            break;
        case 'primera':
            cargar_pagina = 1;
                break;
        case 'ultima':
            cargar_pagina = total_paginas;
            break;
        default:
            if(cargar_pagina > total_paginas){
                cargar_pagina = total_paginas;
            }else if(cargar_pagina < 0){
                cargar_pagina = 1;
            }
            break;
    }
    $('#pagina_actual').val(cargar_pagina);
    actualizarRegistros();
}

//Agregamos shortcuts para put y delete en las llamadas ajax de jquery
jQuery.each( [ "put", "delete" ], function( i, method ) {
    jQuery[ method ] = function( url, data, callback, type ) {
      if ( jQuery.isFunction( data ) ) {
        type = type || callback;
        callback = data;
        data = undefined;
      }
   
      return jQuery.ajax({
        url: url,
        type: method,
        dataType: type,
        data: data,
        success: callback
      });
    };
  });

window.onload = function () { aplicarFiltro(); }
