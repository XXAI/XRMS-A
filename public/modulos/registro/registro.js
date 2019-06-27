function cambiarTipo(){
    $('#puesto_id').val('');
    $('#otro_puesto').val('');
    $('#municipio_id').val('');
    if($('#tipo_asistente').val() == 'personal'){
        $('.form_ayuntamiento').hide();
        $('#div_otro_puesto').show();
    }else{
        $('.form_ayuntamiento').show();
        $('#div_otro_puesto').hide();
        $('#region_id').change();
    }
}

function cambiarPuesto(){
    if($('#puesto_id').val() == 999){
        $('#div_otro_puesto').show();
    }else{
        $('#div_otro_puesto').hide();
        $('#otro_puesto').val('');
    }
}

function enviarFormulario(){
    var parametros = $("#formulario_registro").serialize();
    limpiarErroresFormulario();

    console.log(parametros);
    
    $.post('api/registro', parametros, function(data){
        console.log(data);
        if(data.validacion){
            console.log('exitooooo');
            $('.captura-formulario').hide();
            $('.guardado-correcto').show();
            $('#formulario-completo').addClass('text-white bg-success');
        }else{
            for(var i in data.errores){
                var errores = data.errores[i].join('<br>');
                $('#'+i).addClass('is-invalid');
                $('#error_'+i).text(errores);
            }
        }
    });
}

function cargarMunicipios(){
    if($('#tipo_asistente').val() == 'ayuntamiento'){
        $('#municipio_id').val('');
        if($('#region_id').val() != ''){
            var parametros = {region_id: $('#region_id').val()};
            $.get('api/municipios', parametros, function(data){
                var opciones = "<option value='' selected='selected'>Seleccione un municipio</option>";
                for(var i in data['datos']){
                    opciones += "<option value='"+data['datos'][i].id+"'>"+data['datos'][i].nombre+"</option>";
                }
                $('#municipio_id').html(opciones);
            });
        }else{
            $('#municipio_id').html("<option value='' selected='selected'>Seleccione un municipio</option>");
        }
    }
}

function limpiarErroresFormulario(){
    $('#formulario_registro .is-invalid').removeClass('is-invalid');
    $('#formulario_registro .invalid-feedback').text('');
}

function limpiarFormulario(){
    $('#formulario_registro').trigger('reset');
    $('#tipo_asistente').change();
    $('#puesto_id').change();
    limpiarErroresFormulario();
}

function capturarNuevoRegistro(){
    limpiarFormulario();
    $('.captura-formulario').show();
    $('.guardado-correcto').hide();
    $('#formulario-completo').removeClass('bg-success');
    $('#formulario-completo').removeClass('text-white');
}