function cambiarTipo(){
    $('#puesto_id').val('');
    if($('#tipo_asistente').val() == 'personal'){
        $('.form_ayuntamiento').hide();
        $('#div_otro_puesto').show();
    }else{
        $('.form_ayuntamiento').show();
        $('#div_otro_puesto').hide();
    }
}

function cambiarPuesto(){
    if($('#puesto_id').val() == 999){
        $('#div_otro_puesto').show();
    }else{
        $('#div_otro_puesto').hide();
    }
}

function enviarFormulario(){
    var parametros = $("#formulario_registro").serialize();

    console.log(parametros);
    
    $.post('api/registro', parametros, function(data){
        console.log('exitooooo');
        console.log(data);
    });
}
