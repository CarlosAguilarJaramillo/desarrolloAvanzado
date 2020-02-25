function mostrarDatos(){

    $.ajax({
        //async: true,
        type: "POST",
        url: "util/usuarios/query.php",
        //data: {},
        dataType: 'json',
        beforeSend: function(){
            $("#cntTabla").hide();
            $("#cargando").html('<img src="img/system/cargando.gif" height="70" width="70">');
        },
        error: function(request, status, error){
            alert(request.responseText);
        },
        success: function(respuesta){
            $("#cargando").html('');
            $("#cntTabla").show();

            var mydata = respuesta.data;
            
            var t = $("#tablaUsuarios").DataTable({
                destroy: true,
                data: mydata,
                columns: [
                    {"data":'row'},
                    {"data":'btn_gestion', className: "text-center"},
                    {"data":'usuario', className: "text-center"},
                    {"data":'nombre', className: "text-center"},
                    {"data":'tipo_usuario', className: "text-center"},
                    {"data":'email', className: "text-center"}
                ],
                "columnDefs": [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [0] // Para que el numero no tenga orden solo es un indice
                    }
                ],
                "order": [[0, 'asc']], // asc - desc
                "language":{
                    "url":"lib/js/DataTables/DataTables-1.10.18/Spanish.json"
                },
                "pagingType": "full_numbers" // Para colocar el First & Last
            });

            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        },
        //complete: function(){}
    });

}

function limpiarFormUsuario(){
    $('#formUsuario').trigger("reset");
    $("#usuario").prop('disabled', false);
}

$(document).ready(function (){

    mostrarDatos();

    $("#limpiarFormUsuario").click(function (){
        limpiarFormUsuario();
    });

    $("#consultar").click(function (){
        limpiarFormUsuario();
        mostrarDatos();
    });

    $("#tablaUsuarios").on("click",".gestion_update", function(event){
        var tableInt = $("#tablaUsuarios").DataTable();
        var datos = tableInt.row( $(this).closest('tr') ).data();
        //console.log(datos);
        $("#usuario").prop('disabled', true);
        $("#usuario").val(datos['usuario']);
        $("#nombre").val(datos['nombre']);
        $("#email").val(datos['email']);
        $('#tipo_usuario option[value="'+datos['tipo_usuario']+'"]').prop("selected", true);

        $('.nav-tabs a[href="#menu1"]').tab('show');
    });

    $("#formUsuario").submit(function (){
        var existe = ( $("#usuario").is(":disabled") ? 1 : 0 );
        var usuario = $("#usuario").val().toLowerCase();
        var nombre = $("#nombre").val();
        var email = $("#email").val();
        var tipo_usuario = $("#tipo_usuario option:selected").val();

        var usuario_Send = usuario.replace(/\s/g, "");
        $("#usuario").val(usuario_Send);

        $.ajax({
            async: false,
            type: "POST",
            url: "util/usuarios/gestion.php",
            data: {
                existe:existe,
                usuario: usuario_Send,
                nombre: nombre,
                email:email,
                tipo_usuario:tipo_usuario
            },
            dataType: 'json',
            //beforeSend: function(){},
            error: function(request, status, error){
                alert(request.responseText);
            },
            success: function(respuesta){
                switch(respuesta.estado){
                    case 1:
                        $('#myModalSuccessBody').html(respuesta.mensaje);
                        $('#myModalSuccess').modal('show');

                        $('.nav-tabs a[href="#home"]').tab('show');
                        mostrarDatos();
                        limpiarFormUsuario();
                        break;
                    case 2:
                        $('#myModalWarningBody').html(respuesta.mensaje);
                        $('#myModalWarning').modal('show');    
                        break;
                    default:
                        alert("Se ha producido un error");
                        break;
                }
            },
            //complete: function(){}
        });

        return false;
    });

});