function cambiarTipo(){
    $('#puesto_id').val('');
    if($('#tipo').val() == 'personal'){
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
