$(document).ready(function (){

    $("#formLogin").submit(function (){
        
        var usuario = $("#usuario").val().toLowerCase();
        var clave = $("#clave").val();

        //console.log(usuario+' - '+clave);

        $.ajax({
            async: true,
            type: "POST",
            url: "util/login/login.php",
            data: {
                usuario: usuario,
                clave: clave
            },
            dataType: 'json',
            beforeSend: function(){
                $('#btn_submit').html("Consultando");
                $('#btn_submit').prop("disabled", true);
            },
            error: function(request, status, error){
                alert(request.responseText);
            },
            success: function(respuesta){
                switch(respuesta.estado){
                    case 1:
                        document.location = '';
                        break;
                    case 2:
                        $('#myModalWarningBody').html(respuesta.mensaje);
                        $('#myModalWarning').modal('show');  
                        $("#clave").val('');                  
                        break;
                    default:
                        alert("Se ha producido un error");
                        break;
                }
            },
            complete: function(){
                $('#btn_submit').prop("disabled", false);
                $('#btn_submit').html("Acceder");
            }
        });

        return false;
    });

});